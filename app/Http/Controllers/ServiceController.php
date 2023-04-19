<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'course' => 'required',
            'pet_type' => 'required',
            'availability' => 'required',
            'days' => 'required',
            'price' => 'required|numeric',
            'status' => 'required',
        ];

        $messages = [
            'course.required' => 'The course field is required.',
            'pet_type.required' => 'The pet type field is required.',
            'availability.required' => 'The availability field is required.',
            'days.required' => 'The days field is required.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price field must be a number.',
            'status.required' => 'The status field is required.',
        ];

        $validatedData = $request->validate($rules, $messages);
        $formFields['course'] = $validatedData['course'];
        $formFields['pet_type'] = $validatedData['pet_type'];
        $formFields['availability'] = $validatedData['availability'];
        $formFields['days'] = $validatedData['days'];
        $formFields['price'] = $validatedData['price'];
        $formFields['status'] = $validatedData['status'];
        $formFields['user_id'] = auth()->id() ?? null;

        Service::create($formFields);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $service = Service::where('id', $id)->first();

        $service->delete();

        return redirect()->back()->with('message', 'Successfully deleted');
    }
}
