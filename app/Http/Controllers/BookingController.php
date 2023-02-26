<?php

namespace App\Http\Controllers;

use App\Models\Booking;
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
        $formFields['date'] = $request->input('date');

        dd($formFields);
        // Booking::create($formFields);

        return redirect()->back()->with('message', 'Booking is now placed!');
    }

    public function show()
    {
        $request = Booking::join('pet_info', 'pet_info.pet_id', '=', 'booking.pet_id')
            ->join('service', 'service.user_id', '=', 'booking.trainer_id')
            ->join('users', 'users.id', '=', 'service.user_id')
            ->get();

        return view('owner.show-bookings', [
            'request' => $request
        ]);
    }
}
