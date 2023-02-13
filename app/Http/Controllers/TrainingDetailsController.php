<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingDetails;
use App\Http\Controllers\Controller;

class TrainingDetailsController extends Controller
{
    public function store(Request $request){
        $formFields = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'duration' => 'required',
        ]);

        TrainingDetails::create($formFields);

        return redirect()->to(app('url')->previous()."#here");

    }
}
