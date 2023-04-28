<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Booking;
use App\Models\PetInfo;
use App\Models\Service;
use App\Models\AdminPetType;
use App\Models\AdminService;
use App\Models\Notification;
use App\Models\TrainerModel;
use Illuminate\Http\Request;
use App\Models\TrainerRating;
use App\Models\RequestTrainer;
use App\Models\TrainingDetails;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Notifications\BookingStatusChange;

class TrainerController extends Controller
{
    public function index()
    {
        $trainer_ratings = TrainerRating::where('trainer_id', auth()->user()->id)
            ->join('users', 'users.id', '=', 'rating.client_id')
            ->get();
        $pending_bookings = Booking::where('trainer_id', auth()->user()->id)->where('status', '=', 'pending')->count();
        $completed_bookings = Booking::where('trainer_id', auth()->user()->id)->where('status', '=', 'completed')->count();
        $inprogress_bookings = Booking::where('trainer_id', auth()->user()->id)->where('status', '=', 'in progress')->count();
        $services = Service::where('user_id', auth()->user()->id)->where('status', '=', 'available')->count();
        $all_pending_bookings = Booking::where('trainer_id', auth()->user()->id)->whereIn('status', ['pending', 'in progress', 'approved'])->get();

        $total_stars = 0;
        $count_ratings = count($trainer_ratings);

        foreach ($trainer_ratings as $rating) {
            $total_stars += $rating->stars;
        }

        $avg_rating = $count_ratings > 0 ? round($total_stars / $count_ratings, 2) : 0;


        return view('trainer.dashboard', [
            'trainer' => $trainer_ratings,
            'avg_rating' => $avg_rating,
            'count_ratings' => $count_ratings,
            'pending' => $pending_bookings,
            'completed' => $completed_bookings,
            'inprogress' => $inprogress_bookings,
            'services' => $services,
            'all_pending' => $all_pending_bookings
        ]);
    }

    public function showPortfolioEdit()
    {
        $portfolio = TrainerModel::where('user_id', auth()->user()->id)->first();
        $admin_service = AdminService::where('isPosted', '1')->get();
        $admin_petType = AdminPetType::where('isPosted', '1')->get();
        // dd($portfolio);

        return view('trainer.edit-portfolio', [
            'portfolio' => $portfolio,
            'admin_service' => $admin_service,
            'admin_petType' => $admin_petType,
        ]);
    }

    public function editPortfolio(Request $request)
    {

        $trainer = TrainerModel::where('user_id', auth()->user()->id)->first();
        $data = $request->validate([
            'about_me' => 'required',
            'services' => 'required',
            'experience' => 'required',
            'type' => 'required',
            'certificates' => 'required',
            'journey_photos' => 'required'
        ]);
        $data['type'] = $request->input('type');
        $data['services'] = $request->input('services');

        // dd($data);
        if ($request->hasFile('certificates')) {
            $certificates = $request->file('certificates');
            $certificatesPaths = [];
            foreach ($certificates as $certificate) {
                $path = $certificate->store('certs', 'public');
                $certificatesPaths[] = $path;
            }
            $data['certificates'] = serialize($certificatesPaths);
        }

        if ($request->hasFile('journey_photos')) {
            $photos = $request->file('journey_photos');
            $photosPaths = [];
            foreach ($photos as $photo) {
                $path = $photo->store('exp_photos', 'public');
                $photosPaths[] = $path;
            }
            $data['journey_photos'] = serialize($photosPaths);
        }

        $trainer->update($data);

        return redirect('/trainer/portfolio')->with('message', 'Portfolio updated successfully');
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
            'booking.trainer_id',
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
            'service.description',
            'service.id as service_id',
            'users.email',
            'users.phone_number',
            'request.location'
        )
            ->join('pet_info', 'pet_info.pet_id', '=', 'booking.pet_id')
            ->join('users', 'users.id', '=', 'booking.trainer_id')
            ->join('service', 'service.id', 'booking.service_id')
            ->join('request', 'request.request_id', 'booking.request_id')
            // ->where('users.role', 0)
            ->where('booking.trainer_id', $trainerId)
            ->filter(request()->only(['status', 'pet_type', 'start_date', 'end_date', 'search']))
            ->orderByRaw("FIELD(booking.status, 'pending', 'in progress', 'approved', 'completed', 'declined', 'cancelled') ASC")
            ->paginate(5);
        // dd($request);
        $filteredCount = $request->total();

        $adminPetType = AdminPetType::where('isPosted', '1')->get();

        return view('trainer.show-bookings', [
            'request' => $request,
            'filteredCount' => $filteredCount,
            'admin_pet' => $adminPetType,
        ]);
    }
    // V1
    // public function updateBooking(Request $request)
    // {
    //     $booking = Booking::where('book_id', $request->input('book_id'))->first();

    //     // Check for scheduling conflicts
    //     $conflicting_bookings = Booking::where('trainer_id', $booking->trainer_id)
    //         ->where(function ($query) use ($request) {
    //             $query->where('start_date', '>=', $request->input('start_date'))
    //                 ->where('start_date', '<', $request->input('end_date'))
    //                 ->orWhere('end_date', '>', $request->input('start_date'))
    //                 ->where(
    //                     'end_date',
    //                     '<=',
    //                     $request->input('end_date')
    //                 );
    //         })
    //         ->where('book_id', '!=', $booking->book_id)
    //         ->get();

    //     if ($conflicting_bookings->count() > 0) {
    //         return redirect()->back()->withErrors(['error' => 'Scheduling conflict detected.']);
    //     }

    //     $booking->status = $request->input('status');
    //     $booking->payment = $request->input('payment');
    //     $booking->reason_reject = $request->input('reason_reject');
    //     $booking->save();

    //     return redirect()->back();
    // }
    // V2(mao nani pero di e allow ang booking basta pending)
    // public function updateBooking(Request $request)
    // {
    //     $booking = Booking::where('book_id', $request->input('book_id'))->first();

    //     $trainer_id = $request->input('trainer_id');
    //     $start_date = $request->input('start_date');
    //     $end_date = $request->input('end_date');

    //     $conflicting_bookings = Booking::where('trainer_id', $trainer_id)
    //         ->join('service', 'booking.book_id', '=', 'service.id')
    //         ->whereNotIn('booking.status', ['declined', 'cancelled', 'pending', 'completed'])
    //         ->where('service.service_type', '=', 'public')
    //         ->where(function ($query) use ($start_date, $end_date) {
    //             $query->where('start_date', '<=', $end_date)
    //                 ->where('end_date', '>=', $start_date);
    //         })
    //         ->where('book_id', '<>', $booking->book_id) // exclude current booking
    //         ->get();

    //     if ($conflicting_bookings->count() > 0) {
    //         // There is a scheduling conflict
    //         return redirect()->back()->with('error', 'You are not available during the selected date range.');
    //     }

    //     // Update booking
    //     $booking->status = $request->input('status');
    //     $booking->payment = $request->input('payment');
    //     $booking->reason_reject = $request->input('reason_reject');
    //     $booking->save();

    //     return redirect()->back()->with('message', 'Successfull approved');
    // }
    // V3

    public function updateBooking(Request $request)
    {
        $booking = Booking::where('book_id', $request->input('book_id'))->first();
        $user_to_notify = User::where('id', $booking['client_id'])->first();
        $trainer_id = $request->input('trainer_id');

        $start_date = Carbon::parse($request->input('start_date'));
        $end_date = Carbon::parse($request->input('end_date'));

        $conflicting_bookings = Booking::where('trainer_id', $trainer_id)
            ->join('service', 'booking.service_id', '=', 'service.id')
            ->whereNotIn('booking.status', ['declined', 'cancelled', 'pending', 'completed'])
            ->where(function ($query) use ($start_date, $end_date) {
                $query->where('start_date', '<=', $end_date)
                    ->where('end_date', '>=', $start_date);
            })
            ->where('book_id', '<>', $booking->book_id)
            ->get();

        if ($conflicting_bookings->count() > 0) {
            return redirect()->back()->with('error', 'You are not available during the selected date range.');
        } else {

            $booking->status = $request->input('status');
            $booking->payment = $request->input('payment');
            $booking->reason_reject = $request->input('reason_reject');
            $booking->save();
        }


        //NOTIFY
        $bookingData = [
            'body' => 'Hello, ' . $booking['client_name'] . ' Your booking  ' . $booking['code'] . ' was changed to ' . $booking['status'],
            'subject' => $booking['code'] . '  ' .  $booking['status'] . ' ' . ' by the trainer',
            'bookingStatus' => 'Click here to view',
            'url' => url('/bookings'),
            'endingMessage' => 'Thank you for your support from PetPatrol',
            'message' => $booking['code'] . ' was changed to ' . $booking['status'],
            'reason_reject' => $booking['reason_reject'],

        ];
        $user_to_notify->notify(new BookingStatusChange($bookingData));

        return redirect()->back()->with('message', 'Successfully approved');
    }
    // V4


    public function showPayment()
    {
        $user = auth()->user();
        return view('trainer.settings-payment', ['user' => $user]);
    }

    public function showReport()
    {
        $trainerId = auth()->id();

        $request = Booking::select(
            'booking.book_id',
            'booking.trainer_id',
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
            'service.price',
            'service.description',
            'service.id as service_id',
            'users.email',
            'users.phone_number'
        )
            ->join('pet_info', 'pet_info.pet_id', '=', 'booking.pet_id')
            ->join('users', 'users.id', '=', 'booking.trainer_id')
            ->join('service', 'service.id', 'booking.service_id')
            // ->where('users.role', 0)
            ->where('booking.trainer_id', $trainerId)
            ->where('booking.status', '=', 'completed')
            ->paginate(10);
        // dd($request);

        return view('trainer.report', [
            'request' => $request,
        ]);
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
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        // Verify old password
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }

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
        $user_to_notify = User::where('id', $booking['client_id'])->first();
        $data = $request->only('status', 'service_id', 'pet_id', 'trainer_id');
        $booking->update($data);

        $bookingData = [
            'body' => 'Hello, ' . $booking['client_name'] . ' Your booking  ' . $booking['code'] . 'was changed to ' . $booking['status'],
            'subject' => $booking['code'] . ' ' .  $booking['status'] . ' by the trainer',
            'bookingStatus' => 'Click here to view',
            'url' => url('/bookings'),
            'endingMessage' => 'Thank you for your support from PetPatrol',
            'book_id' => $booking['code'],
            'message' => $booking['code'] . ' was ' . $booking['status'],
            'reason_reject' => $booking['reason_reject'],

        ];
        $user_to_notify->notify(new BookingStatusChange($bookingData));

        if ($booking->status === 'completed') {
            $service = Service::where(
                'id',
                $data['service_id']
            )->first();
            // if ($service->status === 'unavailable') {
            $service->status = 'available';
            $service->save();
            // }

            // $currentCapacity = $service->current_capacity;
            // $capacity = $service->capacity;

            // if ($currentCapacity < $capacity) {
            //     $service->current_capacity = $currentCapacity + 1;
            //     $service->save();
            // }

            $pet = PetInfo::where('pet_id', $data['pet_id'])->first();
            $pet->book_status = 'inactive';
            $pet->save();

            $trainerBooking = User::where('id', $data['trainer_id'])->first();
            $trainerBooking->completedBooking += 1;
            $trainerBooking->save();

            //NOTIFY
            $bookingData = [
                'body' => 'Hello, ' . $booking['client_name'] . ' Your booking  ' . $booking['code'] . 'was  ' . $booking['status'],
                'subject' => $booking['code'] . '  ',  $booking['status'] . ' by the trainer',
                'bookingStatus' => 'Click here to view',
                'url' => url('/bookings'),
                'endingMessage' => 'Thank you for continued support from PetPatrol',
                'book_id' => $booking['code'],
                'message' => $booking['code'] . ' was changed to ' . $booking['status'],
                'reason_reject' => $booking['reason_reject'],

            ];
            $user_to_notify->notify(new BookingStatusChange($bookingData));
        }

        return redirect()->back()->with('message', 'Successfully updated');
    }

    public function showPasswordChange()
    {
        return view('trainer.trainer-password');
    }

    // public function show()
    // {

    //     return view('trainer.portfolio', [
    //         'portfolio' => TrainerModel::where('user_id', auth()->id())->get()
    //     ]);
    // }
    public function show()
    {
        $portfolio = TrainerModel::where('user_id', auth()->id())->get();
        foreach ($portfolio as $item) {
            $item->certificates = unserialize($item->certificates);
            $item->journey_photos = unserialize($item->journey_photos);
        }
        $user = User::where('id', auth()->user()->id)->first();
        $count_portfolio = count($portfolio);

        return view('trainer.portfolio', [
            'portfolio' => $portfolio,
            'trainer' => $user,
            'count_portfolio' => $count_portfolio,
        ]);
    }

    public function showService()
    {
        $service = TrainingDetails::all();
        $training = Service::where('user_id', auth()->id())->get();
        $adminService = AdminService::where('isPosted', 1)->get();
        $adminPetType = AdminPetType::where('isPosted', 1)->get();
        $portfolio = TrainerModel::where('user_id', auth()->user()->id)->get();

        $portfolio_count = count($portfolio);

        return view('trainer.create-service', [
            'service' => $service,
            'training' => $training,
            'adminService' => $adminService,
            'adminPetType' => $adminPetType,
            'portfolio' => $portfolio_count
        ]);
    }

    public function create()
    {
        $admin_service = AdminService::where('isPosted', '1')->get();
        $admin_petType = AdminPetType::where('isPosted', '1')->get();
        return view('trainer.create-portfolio', compact('admin_service', 'admin_petType'));
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'about_me' => 'required',
            'certificates' => 'required',
            'experience' => 'required',
            'services' => 'required',
            'type' => 'required',
            'certificates' => 'required',
            'journey_photos' => 'required'
        ], [
            'services.required' => 'Please select at least one of the services checkbox',
            'type.required' => 'Please select at least one of the type checkbox above'
        ]);

        if ($request->hasFile('certificates')) {
            $certificates = $request->file('certificates');
            $certificatesPaths = [];
            foreach ($certificates as $certificate) {
                $path = $certificate->store('certs', 'public');
                $certificatesPaths[] = $path;
            }
            $formFields['certificates'] = serialize($certificatesPaths);
        }

        if ($request->hasFile('journey_photos')) {
            $photos = $request->file('journey_photos');
            $photosPaths = [];
            foreach ($photos as $photo) {
                $path = $photo->store('exp_photos', 'public');
                $photosPaths[] = $path;
            }
            $formFields['journey_photos'] = serialize($photosPaths);
        }

        $formFields['services'] = $request->input('services');
        $formFields['type'] = $request->input('type');
        $formFields['user_id'] = $request->input('user_id');

        TrainerModel::create($formFields);


        return redirect('/trainer/portfolio')->with('message', 'Portfolio added successfully!');
    }

    public function getEvents()
    {
        $bookings = Booking::select('start_date', 'end_date', 'client_name', 'booking.status', 'service.course', 'booking.book_id')
            ->join('service', 'booking.service_id', '=', 'service.id')
            ->where('trainer_id', auth()->user()->id)
            ->whereIn('booking.status', ['in progress', 'approved'])
            ->get();

        $events = [];

        foreach ($bookings as $booking) {
            $events[] = [
                'code' => $booking->code,
                'title' => $booking->course . ' - ' . $booking->client_name,
                'start' => $booking->start_date,
                'end' => $booking->end_date,
            ];
        }

        return response()->json($events);
    }

    public function showNotifications()
    {
        $notifications = Notification::where('notifiable_id', auth()->user()->id)->paginate(10);

        return view('trainer.notifications', compact('notifications'));
    }

    public function updatePaymentStatus(Request $request, $book_id)
    {
        $booking_payment = Booking::where('book_id', $book_id)->first();
        $data = $request->only('payment');
        $booking_payment->payment = $request->input('payment');
        $booking_payment->update($data);

        return redirect()->back()->with('message', 'Payment successfully updated');
    }
}
