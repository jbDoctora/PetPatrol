<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\PetInfo;
use App\Models\Service;
use App\Models\AdminPetType;
use App\Models\AdminService;
use App\Models\TrainerModel;
use Illuminate\Http\Request;
use App\Models\RequestTrainer;
use App\Models\TrainingDetails;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    public function showWaitingApproval()
    {
        return view('users.waiting-approval');
    }

    public function showBooking()
    {
        $trainerId = auth()->id();

        $request = Booking::select(
            'booking.book_id',
            'booking.status',
            'booking.payment',
            'booking.gcash_refnum',
            'pet_info.pet_id',
            'pet_info.pet_name',
            'pet_info.years',
            'pet_info.months',
            'pet_info.breed',
            'pet_info.weight',
            'pet_info.vaccine',
            'pet_info.vaccine_list',
            'pet_info.info',
            'booking.client_name',
            'booking.start_date',
            'booking.end_date',
            'service.course',
            'service.availability',
            'service.id as service_id',
            'users.email',
            'users.phone_number'
        )
            ->join('pet_info', 'pet_info.pet_id', '=', 'booking.pet_id')
            ->join('users', 'users.id', '=', 'booking.client_id')
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

        // $service = Service::where('id', $request->input('service_id'))->first();
        // $service->status = $request->input('status');
        //$service->save();


        return redirect()->back();
    }

    public function showPayment()
    {
        $user = auth()->user();
        return view('trainer.settings-payment', ['user' => $user]);
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->only(['name', 'sex', 'address', 'phone_number', 'email', 'profile_photo', 'birthday']);

        if ($request->hasFile('profile_photo')) {
            // Delete the old file
            Storage::delete('image/' . $user->profile_photo);

            // Store the new file
            $data['profile_photo'] = $request->file('profile_photo')->store('profile_photo', 'public');
        }

        $user->update($data);

        return redirect()->back()->with('message', 'User updated successfully.');
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('message', 'Password updated successfully.');
    }

    public function updatePayment(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->only('gcash_qr', 'gcash_number');
        if ($request->hasFile('gcash_qr')) {
            // Delete the old file
            Storage::delete('image/' . $user->gcash_qr);

            // Store the new file
            $data['gcash_qr'] = $request->file('gcash_qr')->store('gcash_qr', 'public');
        }

        $user->update($data);

        return redirect()->back()->with('message', 'Payment details updated successfully');
    }

    // public function updateTraining(Request $request, $book_id)
    // {
    //     $booking = Booking::where('book_id', $book_id)->first();

    //     $data = $request->only('status', 'service_id');

    //     $booking->update($data);

    //     if ($booking->status === 'completed') {
    //         $service = Service::where('id', $data['service_id'])->first();
    //         if ($service->status === 'unavailable') {
    //             $service->status = 'available';
    //             $service->save();
    //         }

    //         $currentCapacity = $service->current_capacity;
    //         $capacity = $service->capacity;

    //         if ($currentCapacity < $capacity) {
    //             $service->current_capacity = $currentCapacity + 1;
    //             $service->save();
    //         }
    //     }

    //     return redirect()->back()->with('message', 'Successfully updated');
    // }

    // 2nd version
    public function updateTraining(Request $request, $book_id)
    {
        $booking = Booking::where('book_id', $book_id)->first();
        $data = $request->only('status', 'service_id', 'pet_id');
        $booking->update($data);

        if ($booking->status === 'completed') {
            $service = Service::where(
                'id',
                $data['service_id']
            )->first();
            if ($service->status === 'unavailable') {
                $service->status = 'available';
                $service->save();
            }

            $currentCapacity = $service->current_capacity;
            $capacity = $service->capacity;

            if ($currentCapacity < $capacity) {
                $service->current_capacity = $currentCapacity + 1;
                $service->save();
            }

            $pet = PetInfo::where('pet_id', $data['pet_id'])->first();
            $pet->book_status = 'inactive';
            $pet->save();
        }

        return redirect()->back()->with('message', 'Successfully updated');
    }

    public function showPasswordChange()
    {
        return view('trainer.trainer-password');
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
        $adminService = AdminService::where('isPosted', 1)->get();
        $adminPetType = AdminPetType::where('isPosted', 1)->get();

        return view('trainer.create-service', [
            'service' => $service,
            'training' => $training,
            'adminService' => $adminService,
            'adminPetType' => $adminPetType
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
            $formFields['certificates'] = $request->file('certificates')->store('certs', 'public');
        }

        if ($request->hasFile('journey_photos')) {
            $formFields['journey_photos'] = $request->file('journey_photos')->store('journey_photos', 'public');
        }

        $formFields['services'] = $request->input('services');
        $formFields['type'] = $request->input('type');
        $formFields['user_id'] = $request->input('user_id');

        TrainerModel::create($formFields);


        return redirect('/trainer/portfolio')->with('message', 'Portfolio added successfully!');
    }
}
