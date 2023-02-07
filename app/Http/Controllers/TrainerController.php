<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TrainerModel;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index(){
        return view('trainer.dashboard');
        
    }

    public function show(){
        return view('trainer.portfolio',[
            'portfolio' => TrainerModel::all()
        ]);
    }

    public function create(){
        return view('trainer.create-portfolio');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'about_me' => 'required',
            'certificates' => 'required',
            'experience' => 'required',
        ]);

        if($request->hasFile('certificates')){
            $formFields['certificates'] = $request->file('certificates')->store('images', 'public');
        }
    
        if($request->hasFile('profile_photo')){
            $formFields['profile_photo'] = $request->file('profile_photo')->store('images', 'public');
        }

        if($request->hasFile('journey_photos')){
            $formFields['journey_photos'] = $request->file('journey_photos')->store('images', 'public');
        }
    
        $formFields['services'] = $request->input('services');
        $formFields['type'] = $request->input('type');

        TrainerModel::create($formFields);


        return redirect('/trainer')->with('message', 'Portfolio added successfully!');
    }
}
