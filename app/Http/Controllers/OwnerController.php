<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\PetInfo;
use App\Models\Service;
use App\Models\AdminService;
use App\Models\TrainerModel;
use Illuminate\Http\Request;
use App\Models\TrainerRating;
use App\Models\RequestTrainer;
use App\Models\TrainingDetails;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OwnerController extends Controller
{
    public function index()
    {
        $pending_bookings = Booking::where('client_id', auth()->user()->id)->where('status', '=', 'pending')->count();
        $completed_bookings = Booking::where('client_id', auth()->user()->id)->where('status', '=', 'completed')->count();
        $inprogress_bookings = Booking::where('client_id', auth()->user()->id)->where('status', '=', 'in progress')->count();
        $request = RequestTrainer::where('user_id', auth()->user()->id)->where('request_status', '=', 'active')->get();



        return view('owner.dashboard', [
            'pending' => $pending_bookings,
            'completed' => $completed_bookings,
            'inprogress' => $inprogress_bookings,
            'request' => $request
        ]);
    }


    public function show($request_id)
    {
        $request = RequestTrainer::where('request_id', $request_id)->first();

        $course = $request->course;
        $availability = $request->sessions;
        $type = $request->pet_type;

        $matched_services = DB::table('request')
            ->join('service', function ($join) use ($course, $availability, $type) {
                $join->on('request.course', '=', 'service.course')
                    ->on('request.sessions', '=', 'service.availability')
                    ->on('request.pet_type', '=', 'service.pet_type')
                    ->where('request.course', $course)
                    ->where('request.sessions', $availability)
                    ->where('request.pet_type', $type)
                    ->where('request.user_id', auth()->id())
                    ->where('service.status', 'available');
            })
            ->join('users', function ($join) {
                $join->on('service.user_id', '=', 'users.id')
                    ->where('users.role', 1);
            })
            ->join('pet_info', 'request.pet_name', '=', 'pet_info.pet_name')
            ->select(
                'users.id as user_id',
                'users.email',
                'users.address',
                'users.completedBooking',
                'users.profile_photo',
                'users.name as trainer_name',
                'service.id as service_id',
                'service.*',
                'pet_info.pet_name',
                'pet_info.pet_id',
                'request.request_id',
                'users.avg_rating',
            )
            ->where('request.request_id', $request_id)
            ->where('pet_info.book_status', 'requested')
            ->paginate(10);

        // dd($matched_services);
        return view('owner.show-matched', [
            'matchedservices' => $matched_services,
            'request' => $request,
            'request_id' => $request_id,
            // 'avg_rating' => $avg_rating,
        ]);
    }

    public function showTraining($service_id)
    {
        return view('owner.service-plan', [
            'trainingDet' => TrainingDetails::where('service_id', $service_id)->get(),
            'service' => Service::find($service_id)
        ]);
    }

    public function showTrainerInfo($user_id)
    {
        $showInfo = Service::where('service.user_id', $user_id)
            ->join('users', 'service.user_id', '=', 'users.id')
            ->limit(1)
            ->get();
        $portfolio = TrainerModel::where('user_id', $user_id)->get();
        $rating = TrainerRating::where('trainer_id', $user_id)
            ->join('users', 'users.id', '=', 'client_id')
            ->get();

        return view('owner.show-trainerInfo', [
            'showInfo' => $showInfo,
            'portfolio' => $portfolio,
            'rating' => $rating,
        ]);
    }

    public function create()
    {
        $adminService = AdminService::where('isPosted', 1)->get();

        $petinfo = PetInfo::where('owner_id', auth()->id())
            ->whereNotIn('book_status', ['pending', 'requested'])
            ->paginate(9);
        $requestedPetNames = RequestTrainer::where('user_id', auth()->id())->pluck('pet_name')->toArray();
        // dd($petinfo);
        return view('owner.book-trainer', compact('adminService', 'petinfo', 'requestedPetNames'));
    }

    public function getEvents()
    {
        $bookings = Booking::select('start_date', 'end_date', 'trainer_name', 'booking.status', 'service.course', 'booking.book_id')
            ->join('service', 'booking.service_id', '=', 'service.id')
            ->where('client_id', auth()->user()->id)
            ->whereIn('booking.status', ['in progress', 'approved'])
            ->get();

        $events = [];

        foreach ($bookings as $booking) {
            $events[] = [
                'code' => $booking->code,
                'title' => $booking->course . ' - ' . $booking->trainer_name,
                'start' => $booking->start_date,
                'end' => $booking->end_date
            ];
        }

        return response()->json($events);
    }

    public function destroyRequest($id)
    {
        $request_trainer = RequestTrainer::where('request_id', $id)->first();
        $request_trainer->delete();



        return redirect()->back()->with('message', 'Request Successfully Deleted');
    }
}
