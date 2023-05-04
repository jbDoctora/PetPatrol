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
            'description' => 'required',
            'days' => 'required',
            'price' => 'required|numeric',
            'status' => 'required',
        ];

        $messages = [
            'course.required' => 'The course field is required.',
            'pet_type.required' => 'The pet type field is required.',
            'description.required' => 'The description field is required.',
            'days.required' => 'The days field is required.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price field must be a number.',
            'status.required' => 'The status field is required.',
        ];

        $validatedData = $request->validate($rules, $messages);
        $formFields['course'] = $validatedData['course'];
        $selectedPetType = $request->input('pet_type');
        $formFields['description'] = $validatedData['description'];
        $formFields['days'] = $validatedData['days'];
        $formFields['price'] = $validatedData['price'];
        $formFields['status'] = $validatedData['status'];
        $formFields['user_id'] = auth()->id() ?? null;

        $pettype_to_implode = implode(',', $selectedPetType);
        $formFields['pet_type'] = $pettype_to_implode;

        Service::create($formFields);

        return redirect()->back()->with('message', 'Successfully updated');
    }

    public function destroy($id)
    {
        $service = Service::where('id', $id)->first();

        $service->delete();

        return redirect()->back()->with('message', 'Successfully deleted');
    }

    public function updateService(Request $request, $service_id)
    {
        $service = Service::where('id', $service_id)->first();
        $data = $request->all();

        $selectedPetType = $request->input('pet_type');

        $pettype_to_implode = implode(',', $selectedPetType);
        $data['pet_type'] = $pettype_to_implode;

        $service->update($data);

        return redirect()->back()->with('message', 'Service Successfully udpated');
    }
}
