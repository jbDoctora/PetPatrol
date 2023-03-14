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

        return view('owner.request', [
            'requestinfo' => $requestinfo,
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'pet_name' => [
                'required',
                Rule::unique('request')->where(function ($query) use ($request) {
                    return $query->where('user_id', $request->input('user_id'));
                }),
            ],
            'course' => 'required',
            'sessions' => 'required',
            'location' => 'required'
        ]);
        $formFields['user_id'] = $request->input('user_id');
        $formFields['request_status'] = $request->input('request_status');
        $formFields['pet_type'] = $request->input('pet_type');
        RequestTrainer::create($formFields);

        return redirect('/owner')->with('message', 'Request added successfully!');
    }
}
