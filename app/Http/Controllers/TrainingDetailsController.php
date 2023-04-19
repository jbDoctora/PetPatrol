<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\TrainingDetails;
use App\Http\Controllers\Controller;

class TrainingDetailsController extends Controller
{
    public function create($service_id)
    {

        return view('trainer.create-details', [
            'trainingDet' => TrainingDetails::where('service_id', $service_id)->get(),
            'service' => Service::find($service_id)
        ]);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'lesson' => 'required',
            'service_id' => 'required|exists:service,id',
            'description' => 'required',
        ]);
        $formFields['lesson'] = $request->input('lesson');
        $formFields['description'] = $request->input('description');
        $formFields['service_id'] = $request->input('service_id');

        TrainingDetails::create($formFields);

        return redirect()->back()->with('message', 'Successfully added');
    }
}
