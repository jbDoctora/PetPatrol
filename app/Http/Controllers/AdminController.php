<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\AdminPetType;
use App\Models\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function showTrainerApproval()
    {
        $users = DB::table('users')->where('role', 1)->where('admin_approve', 0)->get();
        return view('admin.trainer-approval', compact('users'));
    }

    public function updateApproval(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->only(['admin_approve']));

        return redirect()->back()->with('message', 'Updated Successfully!');
    }

    public function showUsers()
    {
        $users = User::whereIn('role', [0, 1])->get();

        return view('admin.view-users', compact('users'));
    }

    public function showAdminService()
    {
        $service = AdminService::all();
        return view('admin.view-service', compact('service'));
    }

    public function showAdminPetType()
    {
        $petType = AdminPetType::all();
        return view('admin.view-petType', compact('petType'));
    }

    public function showBookings()
    {

        $bookings = Booking::select(
            'booking.book_id',
            'booking.status',
            'booking.payment',
            'pet_info.pet_name',
            'pet_info.type',
            'booking.trainer_name',
            'booking.client_name',
            'booking.start_date',
            'service.course',
            'service.availability',
            'service.id as service_id'
        )
            ->join('pet_info', 'pet_info.pet_id', '=', 'booking.pet_id')
            ->join('users', 'users.id', '=', 'booking.client_id')
            ->join('service', 'service.id', 'booking.service_id')
            ->get();
        // ->get();
        // dd($request);
        return view('admin.bookings', [
            'bookings' => $bookings
        ]);
    }

    public function storeService(Request $request)
    {
        $formFields = $request->validate([
            'admin_service' => 'required',
        ]);
        $formFields['isPosted'] = $request->input('isPosted');
        AdminService::create($formFields);

        return redirect()->back()->with('message', 'New service added');
    }

    public function storePetType(Request $request)
    {
        $formFields = $request->validate([
            'admin_petType' => 'required',
        ]);
        $formFields['isPosted'] = $request->input('isPosted');
        AdminPetType::create($formFields);

        return redirect()->back()->with('message', 'New pet type added');
    }

    public function showReport()
    {
        // $trainerId = auth()->id();

        $request = Booking::select(
            'booking.book_id',
            'booking.trainer_id',
            'booking.status',
            'booking.payment',
            'booking.gcash_refnum',
            'pet_info.pet_id',
            'pet_info.pet_name',
            'pet_info.years',
            'pet_info.months',
            'pet_info.breed',
            'pet_info.weight',
            'pet_info.vaccine',
            'pet_info.vaccine_list',
            'pet_info.info',
            'booking.client_name',
            'booking.start_date',
            'booking.end_date',
            'service.course',
            'service.price',
            'service.availability',
            'service.id as service_id',
            'users.email',
            'users.phone_number'
        )
            ->join('pet_info', 'pet_info.pet_id', '=', 'booking.pet_id')
            ->join('users', 'users.id', '=', 'booking.trainer_id')
            ->join('service', 'service.id', 'booking.service_id')
            // ->where('users.role', 0)
            // ->where('booking.trainer_id', $trainerId)
            ->where('booking.status', '=', 'completed')
            ->paginate(10);
        // dd($request);

        return view('admin.report', [
            'request' => $request,
        ]);
    }
}
