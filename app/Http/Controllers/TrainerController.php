<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Service;
use App\Models\TrainerModel;
use Illuminate\Http\Request;
use App\Models\TrainingDetails;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class TrainerController extends Controller
{
    public function index()
    {
        return view('trainer.dashboard');
    }

    public function showProfile(User $user)
    {
        $user = auth()->user();
        return view('trainer.trainer-profile', ['user' => $user]);
    }

    public function showBooking()
    {
        $trainerId = auth()->id();

        $request = Booking::select(
            'booking.book_id',
            'booking.status',
            'booking.payment',
            'pet_info.pet_name',
            'booking.client_name',
            'booking.start_date',
            'service.course',
            'service.availability',
            'service.id as service_id'
        )
            ->join('pet_info', 'pet_info.pet_id', '=', 'booking.pet_id')
            ->join('users', 'users.id', '=', 'booking.trainer_id')
            ->join('service', 'service.id', 'booking.service_id')
            // ->where('users.role', 0)
            ->where('booking.trainer_id', $trainerId)
            ->get();
        // dd($request);
        return view('trainer.show-bookings', [
            'request' => $request
        ]);
    }
    public function updateBooking(Request $request)
    {
        $booking = Booking::where('book_id', $request->input('book_id'))->first();
        $booking->status = $request->input('status');
        $booking->payment = $request->input('payment');
        $booking->reason_reject = $request->input('reason_reject');
        $booking->save();

        $service = Service::where('id', $request->input('service_id'))->first();
        $service->status = $request->input('status');
        $service->save();


        return redirect()->back();
    }

    public function showSettings()
    {
        return view('trainer.settings');
    }

    public function showPayment()
    {
        return view('trainer.settings-payment');
    }

    public function updateProfile(Request $request, User $id)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'birthday' => 'required',
            'age' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'nullable',
            'password' => 'nullable', //|confirmed|min:6
        ]);
        $formFields['sex'] = $request->input('sex');
        if ($request->hasFile('profile_photo')) {
            $formFields['profile_photo'] = $request->file('profile_photo')->store('profile_photo', 'public');
        }
        if (!empty($formFields['password'])) {
            $formFields['password'] = bcrypt($formFields['password']);
        } else {
            unset($formFields['password']);
        }
        // dd($formFields);
        $id->update($formFields);

        return back()->with('message', 'Profile updated successfully!');
    }

    public function show()
    {

        return view('trainer.portfolio', [
            'portfolio' => TrainerModel::where('user_id', auth()->id())->get()
        ]);
    }

    public function showService()
    {
        $service = TrainingDetails::all();
        $training = Service::where('user_id', auth()->id())->get();

        return view('trainer.create-service', [
            'service' => $service,
            'training' => $training,
        ]);
    }

    public function create()
    {
        return view('trainer.create-portfolio');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'about_me' => 'required',
            'certificates' => 'required',
            'experience' => 'required',
        ]);

        if ($request->hasFile('certificates')) {
            $formFields['certificates'] = $request->file('certificates')->store('images', 'public');
        }

        if ($request->hasFile('journey_photos')) {
            $formFields['journey_photos'] = $request->file('journey_photos')->store('images', 'public');
        }

        $formFields['services'] = $request->input('services');
        $formFields['type'] = $request->input('type');
        $formFields['user_id'] = $request->input('user_id');

        TrainerModel::create($formFields);


        return redirect('/trainer/portfolio')->with('message', 'Portfolio added successfully!');
    }
}
