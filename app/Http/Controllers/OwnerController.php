<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PetInfo;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\RequestTrainer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\TrainingDetails;

class OwnerController extends Controller
{
    public function index()
    {
        return view('owner.dashboard');
    }

    public function show($request_id)
    {
        $request = RequestTrainer::where('request_id', $request_id)->get();

        foreach ($request as $req) {
            $course = $req->course;
            $availability = $req->sessions;
            $type = $req->pet_type;

            $matched_services = DB::table('request')
                ->join('service', function ($join) use ($course, $availability, $type) {
                    $join->on('request.course', '=', 'service.course')
                        ->on('request.sessions', '=', 'service.availability')
                        ->on('request.pet_type', '=', 'service.pet_type')
                        ->where('request.course', $course)
                        ->where('request.sessions', $availability)
                        ->where('request.pet_type', $type)
                        ->where('service.status', 'active');
                })
                ->join('users', function ($join) {
                    $join->on('service.user_id', '=', 'users.id')
                        ->where('users.role', 1);
                })
                // ->join('pet_info', 'request.user_id', '=', 'pet_info.owner_id')
                ->where('request.user_id', auth()->id())
                ->get();


            // dd($matched_services);
            return view('owner.show-matched', [
                'matchedservices' => $matched_services,
                'request' => $request
            ]);
        }
    }
    // public function show($request_id)
    // {
    //     // Retrieve the request with the given ID
    //     $request = RequestTrainer::findOrFail($request_id);
    //     // $request = RequestTrainer::where('request.request_id', $request_id)->get();

    //     // Retrieve the matched services using a SQL join operation
    //     $matched_services = DB::table('service')
    //         ->join('users', 'service.user_id', '=', 'users.id')
    //         ->join('request', function ($join) use ($request) {
    //             $join->on('service.course', '=', 'request.course')
    //                 ->on('service.pet_type', '=', 'request.pet_type')
    //                 ->on('service.availability', '=', 'request.sessions')
    //                 ->where('users.role', '=', 1) // Only match with trainers
    //                 ->where('request.request_id', '=', $request->request_id);
    //         })
    //         ->select('service.*')
    //         ->get();
    //     // dd($matched_services);
    //     // Pass the matched services to the view
    //     return view('owner.show-matched', ['matchedservices' => $matched_services, 'request' => $request]);
    // }

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
            ->get();

        return view('owner.show-trainerInfo', [
            'showInfo' => $showInfo
        ]);
    }

    public function create()
    {
        $petinfo = PetInfo::where('owner_id', auth()->id())->paginate(9);
        $requestedPetNames = RequestTrainer::where('user_id', auth()->id())->pluck('pet_name')->toArray();
        // dd($petinfo);
        return view('owner.book-trainer', compact('petinfo', 'requestedPetNames'));
    }
}
