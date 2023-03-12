<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $formFields['pet_id'] = $request->input('pet_id');
        $formFields['client_id'] = $request->input('client_id');
        $formFields['trainer_id'] = $request->input('trainer_id');
        $formFields['status'] = $request->input('status');
        $formFields['start_date'] = $request->input('start_date');
        $formFields['payment'] = $request->input('payment');
        $formFields['service_id'] = $request->input('service_id');
        $formFields['client_name'] = $request->input('client_name');
        $formFields['trainer_name'] = $request->input('trainer_name');

        Booking::create($formFields);

        $service_id = $request->input('service_id');
        $service = Service::find($service_id);
        $service->status = $request->input('status');
        $service->save();

        return redirect()->back()->with('message', 'Booking is now placed!');
    }

    public function show()
    {
        $clientId = auth()->id();

        $request = Booking::join('pet_info', 'pet_info.pet_id', '=', 'booking.pet_id')
            ->join('service', 'service.user_id', '=', 'booking.trainer_id')
            // ->join('users', 'users.id', '=', 'service.user_id')
            ->where('booking.client_id', $clientId)
            ->get();
        // dd($request);
        return view('owner.show-bookings', [
            'request' => $request
        ]);
    }
}
