<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\PetInfo;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\RequestTrainer;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $formFields = $request->all();
        Booking::create($formFields);

        $service_id = $request->input('service_id');
        $service = Service::find($service_id);
        $service->status = $request->input('status');
        $service->save();

        $request_id = $request->input('request_id');
        $requestTrainer = RequestTrainer::where('request_id', $request_id)->first();
        $requestTrainer->request_status = "pending";
        $requestTrainer->save();

        $pet_id = $request->input('pet_id');
        $pet_status = PetInfo::where('pet_id', $pet_id)->first();
        $pet_status->book_status = 'pending';
        $pet_status->save();


        return redirect('/bookings')->with('message', 'Booking is now placed!');
    }

    public function show()
    {
        $clientId = auth()->id();

        $request = Booking::select(
            'booking.book_id',
            'booking.status',
            'booking.payment',
            'pet_info.pet_name',
            'booking.trainer_name',
            'booking.start_date',
            'service.course',
            'service.availability',
            'service.id as service_id'
        )
            ->join('pet_info', 'pet_info.pet_id', '=', 'booking.pet_id')
            ->join('users', 'users.id', '=', 'booking.client_id')
            ->join('service', 'service.id', 'booking.service_id')
            ->where('booking.client_id', $clientId)
            ->paginate(5);
        // ->get();
        // dd($request);
        return view('owner.show-bookings', [
            'request' => $request
        ]);
    }
}
