<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestTrainer;
use App\Http\Controllers\Controller;

class RequestTrainerController extends Controller
{
    public function index(){
        return view('owner.request',[
            'requestinfo' => RequestTrainer::paginate(5)
        ]);
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'pet' => 'required',
            'vaccinated' => 'required',
            'course' => 'required',
            'info' => 'required',
            'sessions' => 'required',
            'date' => 'required',
            'location' => 'required',
        ]);

        RequestTrainer::create($formFields);

        return redirect('/')->with('message', 'Request added successfully!');
    }
}
