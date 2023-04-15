<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\PetInfo;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\TrainerRating;
use App\Models\RequestTrainer;
use App\Models\TrainingDetails;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $formFields = $request->all();
        Booking::create($formFields);

        $service_id = $request->input('service_id');
        $service = Service::find($service_id);

        // Check if the capacity of the service is greater than 0
        if ($service->current_capacity >= $service->capacity) {
            $service->current_capacity -= 1;
            $service->status = "available";
        } elseif ($service->current_capacity == 1) {
            $service->current_capacity -= 1;
            $service->status = "unavailable";
        } else {
            $service->status = "unavailable";
        }


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

    public function storeRating(Request $request)
    {
        $formFields = $request->all();

        $rating = TrainerRating::create($formFields);
        // dd($rating);
        return redirect()->back()->with('message', 'Rating added');
    }

    public function show()
    {
        $clientId = auth()->id();

        $request = Booking::select(
            'booking.book_id',
            'booking.status',
            'booking.payment',
            'pet_info.pet_name',
            'pet_info.pet_id',
            'booking.trainer_name',
            'booking.trainer_id',
            'booking.client_id',
            'booking.start_date',
            'booking.end_date',
            'service.course',
            'service.availability',
            'service.id as service_id'
        )
            ->join('pet_info', 'pet_info.pet_id', '=', 'booking.pet_id')
            ->join('users', 'users.id', '=', 'booking.client_id')
            ->join('service', 'service.id', 'booking.service_id')
            ->where('booking.client_id', $clientId)
            ->orderBy('status', 'asc')
            ->paginate(5);
        // ->get();
        // dd($request);
        return view('owner.show-bookings', [
            'request' => $request
        ]);
    }

    public function showCheckout($id)
    {
        $data = Booking::where('book_id', $id)->first();

        $request = Booking::select(
            'booking.book_id',
            'booking.status',
            'booking.payment',
            'pet_info.pet_name',
            'booking.trainer_name',
            'booking.start_date',
            'service.course',
            'service.availability',
            'service.id as service_id',
            'users.gcash_qr',
            'users.gcash_number',
            'booking.gcash_refnum',
            'service.price',
        )
            ->join('pet_info', 'pet_info.pet_id', '=', 'booking.pet_id')
            ->join('users', 'users.id', '=', 'booking.trainer_id')
            ->join('service', 'service.id', 'booking.service_id')
            // ->where('booking.trainer_id', $id)
            ->first();

        // dd($request);

        return view('owner.checkout', compact('request'));
    }

    public function updatePayment(Request $request, $book_id)
    {
        $book_id = Booking::findOrFail($book_id);

        $data = [
            'gcash_refnum' => $request->input('gcash_refnum')
        ];


        $book_id->update($data);

        return redirect('/bookings')->with('message', 'Payment Uploaded');
    }

    public function showBooking($id)
    {
        $data = Booking::where('book_id', $id);

        $request = Booking::select(
            'booking.book_id',
            'booking.status',
            'booking.payment',
            'pet_info.pet_name',
            'pet_info.years',
            'pet_info.months',
            'booking.trainer_name',
            'booking.start_date',
            'booking.end_date',
            'service.course',
            'service.availability',
            'service.id as service_id',
            'users.gcash_qr',
            'users.gcash_number',
            'users.profile_photo',
            'booking.gcash_refnum',
            'service.price',
        )
            ->join('pet_info', 'pet_info.pet_id', '=', 'booking.pet_id')
            ->join('users', 'users.id', '=', 'booking.trainer_id')
            ->join('service', 'service.id', 'booking.service_id')
            ->where('booking.book_id', $id)
            ->get();

        $service_id = $request->first()->service_id;

        $trainingDetails = TrainingDetails::where('service_id', $service_id)->get();

        // dd($request);
        return view('owner.view-progress', compact('request', 'trainingDetails'));
    }
}
