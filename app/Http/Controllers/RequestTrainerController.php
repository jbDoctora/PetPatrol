<?php

namespace App\Http\Controllers;

use App\Models\PetInfo;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\RequestTrainer;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RequestTrainerController extends Controller
{
    // public function index()
    // {
    //     return view('owner.request', [
    //         'requestinfo' => RequestTrainer::where('user_id', auth()->id())->get(),
    //     ]);
    // }

    public function index()
    {
        $requestinfo = RequestTrainer::where('user_id', auth()->id())
            ->where('request_status', 'active')
            ->get();

        // $request = RequestTrainer::find($requestinfo->first()->request_id);

        // $course = $request->course;
        // $availability = $request->sessions;
        // $type = $request->pet_type;

        // $matched_services = DB::table('request')
        //     ->join('service', function ($join) use ($course, $availability, $type) {
        //         $join->on('request.course', '=', 'service.course')
        //             ->on('request.sessions', '=', 'service.availability')
        //             ->on('request.pet_type', '=', 'service.pet_type')
        //             ->where('request.course', $course)
        //             ->where('request.sessions', $availability)
        //             ->where('request.pet_type', $type)
        //             ->where('request.user_id', auth()->id())
        //             ->where('service.status', 'active');
        //     })
        //     ->join('users', function ($join) {
        //         $join->on('service.user_id', '=', 'users.id')
        //             ->where('users.role', 1);
        //     })
        //     ->join(
        //         'pet_info',
        //         'request.pet_name',
        //         '=',
        //         'pet_info.pet_name'
        //     )
        //     ->select(
        //         'users.id as user_id',
        //         'users.email',
        //         'users.address',
        //         'users.name as trainer_name',
        //         'service.id as service_id',
        //         'service.*',
        //         'pet_info.pet_name',
        //         'pet_info.pet_id',
        //         'request.request_id'
        //     )
        //     ->where('request.request_id', $request->request_id)
        //     ->where('pet_info.book_status', 'requested')
        //     ->get();

        // $match_count = count($matched_services);

        return view('owner.request', [
            'requestinfo' => $requestinfo,
            // 'match_count' => $match_count
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'pet_name' => 'required',
            //  [
            //     'required',
            //     Rule::unique('request')->where(function ($query) use ($request) {
            //         return $query->where('user_id', $request->input('user_id'));
            //     }),
            // ],
            'course' => 'required',
            'location' => 'required'
        ]);
        $formFields['user_id'] = $request->input('user_id');
        $formFields['request_status'] = $request->input('request_status');
        $formFields['pet_type'] = $request->input('pet_type');
        $formFields['pet_id'] = $request->input('pet_id');
        RequestTrainer::create($formFields);

        $pet_id = $request->input('pet_id');
        $pet_status = PetInfo::where('pet_id', $pet_id)->first();
        $pet_status->book_status = "requested";
        $pet_status->save();

        return redirect('/request')->with('message', 'Request added successfully!');
    }
}
