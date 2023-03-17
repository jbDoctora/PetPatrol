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
            $request_id = $req->request_id;
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
                ->join('pet_info', 'request.pet_name', '=', 'pet_info.pet_name')
                ->select('service.id as service_id', 'users.id as user_id', 'users.name as user_name', 'users.*', 'service.*', 'pet_info.pet_name', 'pet_info.pet_id', 'request.request_id')
                ->where('request.user_id', auth()->id())
                ->where('pet_info.book_status', 'inactive')
                ->get();


            // dd($matched_services);
            return view('owner.show-matched', [
                'matchedservices' => $matched_services,
                'request' => $request,
                'request_id' => $request_id
            ]);
        }
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
            ->get();

        return view('owner.show-trainerInfo', [
            'showInfo' => $showInfo
        ]);
    }

    // public function create()
    // {
    //     $petinfo = PetInfo::where('owner_id', auth()->id())->paginate(9);
    //     $requestedPetNames = RequestTrainer::where('user_id', auth()->id())->pluck('pet_name')->toArray();
    //     // dd($petinfo);
    //     return view('owner.book-trainer', compact('petinfo', 'requestedPetNames'));
    // }
    public function create()
    {
        $petinfo = PetInfo::where('owner_id', auth()->id())
            ->where('book_status', '<>', 'pending') //add this line to check book_status column value
            ->paginate(9);
        $requestedPetNames = RequestTrainer::where('user_id', auth()->id())->pluck('pet_name')->toArray();
        // dd($petinfo);
        return view('owner.book-trainer', compact('petinfo', 'requestedPetNames'));
    }
}
