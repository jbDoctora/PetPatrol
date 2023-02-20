<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
     public function store(Request $request){
        $formFields['course'] = $request->input('course');
        $formFields['pet_type'] = $request->input('pet_type');
        $formFields['availability'] = $request->input('availability');
        $formFields['weeks'] = $request->input('weeks');
        $formFields['user_id'] = auth()->id() ?? null;

        Service::create($formFields);

        return redirect()->back();
    }
}
