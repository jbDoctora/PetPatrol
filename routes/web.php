<?php

use Illuminate\Support\Str;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\ReportSuggestions;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PetInfoController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TrainerController;
use Symfony\Component\Routing\RequestContext;
use App\Http\Controllers\RequestTrainerController;
use App\Http\Controllers\TrainingDetailsController;
use App\Http\Controllers\ReportSuggestionsController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

//use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Authentication Routes
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Registration Routes
Route::get('/register-owner', [UserController::class, 'create'])->middleware('guest');
Route::get('/register-trainer', [UserController::class, 'createNew'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);

// Email Verification Routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/owner');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::put('/notifications/{notification}', function (Illuminate\Notifications\DatabaseNotification $notification) {
    $notification->markAsRead();

    if (auth()->user()->role == 1) {
        return redirect('/trainer/bookings');
    } else {
        return redirect('/bookings');
    }
})->name('notifications.markAsRead');

//NOTIFICATION MARK AS READ AND CLEAR
Route::post('/notifications/markAllAsRead', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return back();
})->name('notifications.markAllAsRead');
Route::post('/notifications/clearAll', [NotificationController::class, 'clearAll'])->name('notifications.clearAll');

//Trainer Application
Route::get('/trainer/waiting-approval', [TrainerController::class, 'showWaitingApproval'])->middleware('auth');
//Ban User
Route::get('/banned', [UserController::class, 'showBanned'])->middleware('auth')->name('banned');

// GET FORGOT PASSWORD
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

// GET RESET PASSWORD
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', [
        'token' => $token,
        'email' => request()->input('email'),
    ]);
})->middleware('guest')->name('password.reset');

//POST Forgot Password
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

//POST Reset Password Form
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

// Trainer Routes
Route::middleware(['auth', 'isTrainer', 'checkApproval', 'banned'])->group(function () {
    Route::get('/trainer', [TrainerController::class, 'index']);
    Route::put('/trainer/bookings/update', [TrainerController::class, 'updateBooking']);
    Route::get('/trainer/bookings', [TrainerController::class, 'showBooking']);
    Route::put('/trainer/bookings/startTraining/{book_id}', [TrainerController::class, 'updateTraining']); //reuse this route for updating booking status
    Route::get('/trainer/portfolio', [TrainerController::class, 'show']);
    Route::get('/trainer/profile', [TrainerController::class, 'showProfile']);
    Route::put('/trainer/{user}/update-profile', [TrainerController::class, 'updateProfile']);
    Route::put('trainer/profile/{id}/changePassword', [TrainerController::class, 'updatePassword']);
    Route::get('/trainer/profile/change-password', [TrainerController::class, 'showPasswordChange']);
    Route::get('/trainer/portfolio/create', [TrainerController::class, 'create']);
    Route::post('/trainer/portfolio/add', [TrainerController::class, 'store']);
    Route::get('/trainer/portfolio/edit', [TrainerController::class, 'showPortfolioEdit']);
    Route::put('/trainer/portfolio/edit/update', [TrainerController::class, 'editPortfolio']);
    Route::get('/trainer/service/add', [TrainerController::class, 'showService']);
    Route::get('/settings/payment', [TrainerController::class, 'showPayment']);
    Route::put('/settings/payment/{id}', [TrainerController::class, 'updatePayment']);
    Route::post('/trainer/service/{service_id}/add-service/add', [TrainingDetailsController::class, 'store']);
    Route::get('/trainer/service/add-service/{service_id}', [TrainingDetailsController::class, 'create']);
    Route::post('/trainer/service/add-service/addService', [ServiceController::class, 'store']);
    Route::get('/events', [TrainerController::class, 'getEvents']);
    Route::delete('/trainer/service/delete/{id}', [ServiceController::class, 'destroy']);
    Route::put('/trainer/service/update/{service_id}', [ServiceController::class, 'updateService']);
    Route::get('/trainer/report', [TrainerController::class, 'showReport']);
    Route::put('/trainer/service/edit', [TrainingDetailsController::class, 'updateDetails']);
    Route::delete('/trainer/service_details/delete/{train_id}', [TrainingDetailsController::class, 'delete']);
    Route::get('/trainer/notifications', [TrainerController::class, 'showNotifications']);
});

// Owner Routes
Route::middleware(['auth', 'verified', 'isOwner', 'banned'])->group(function () {
    Route::get('/owner', [OwnerController::class, 'index']);
    Route::get('/pet-info', [PetInfoController::class, 'index']);
    Route::put('/pet-info/{id}', [PetInfoController::class, 'edit']);
    Route::put('/edit/status/{pet_id}', [PetInfoController::class, 'updateStatus']);
    Route::get('/pet/add-info', [PetInfoController::class, 'create']);
    Route::post('/pet/add-info/add', [PetInfoController::class, 'store']);
    Route::get('/book-trainer', [OwnerController::class, 'create']);
    Route::post('/book-trainer/add', [RequestTrainerController::class, 'store']);
    Route::get('/request', [RequestTrainerController::class, 'index']);
    Route::get('/show-matched/trainerInfo/{user_id}', [OwnerController::class, "showTrainerInfo"]);
    Route::get('/show-matched/{request_id}', [OwnerController::class, 'show']);
    Route::post('/show-matched/book', [BookingController::class, 'store']);
    Route::get('/bookings', [BookingController::class, "show"]);
    Route::put('/bookings/{id}/update', [BookingController::class, 'updateStatus']);
    Route::get('/show-matched/training-plan/{service_id}', [OwnerController::class, 'showTraining']);
    Route::get('/profile', [UserController::class, 'edit']);
    Route::get('/profile/change-password', [UserController::class, 'editPassword']);
    Route::put('/profile/{id}', [UserController::class, 'updateProfile']);
    Route::put('/profile/{id}/change-password', [UserController::class, 'updatePassword']);
    Route::get('/checkout/{book_id}', [BookingController::class, 'showCheckout']);
    Route::put('/checkout/{book_id}/pay', [BookingController::class, 'updatePayment']);
    Route::get('/bookings/{book_id}', [BookingController::class, 'showBooking']);
    Route::post('/bookings/add-rating', [BookingController::class, 'storeRating']);
    Route::get('/events/owner', [OwnerController::class, 'getEvents']);
    Route::put('/request/delete/{request_id}', [OwnerController::class, 'updateRequest']);
    Route::get('/owner/notifications', [OwnerController::class, 'showNotifications']);
});

// Admin Routes
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/trainer-approval', [AdminController::class, 'showTrainerApproval']);
    Route::put('/admin/trainer-approval/{id}', [AdminController::class, 'updateApproval']);
    Route::get('/admin/monitor/users', [AdminController::class, 'showUsers']);
    Route::get('/admin/service', [AdminController::class, 'showAdminService']);
    Route::get('/admin/pet-type', [AdminController::class, 'showAdminPetType']);
    Route::post('/admin/pet-type/add', [AdminController::class, 'storePetType']);
    Route::post('/admin/service/add', [AdminController::class, 'storeService']);
    Route::get('/admin/bookings', [AdminController::class, 'showBookings']);
    Route::get('/admin/reports', [AdminController::class, 'showReport']);
    Route::put('/admin/monitor/users/update', [AdminController::class, 'updateBan']);
    Route::get('/admin/feedbacks', [AdminController::class, 'showFeedbacks']);
    Route::get('/admin/monitor/showBannedUsers', [AdminController::class, 'showBanned']);
    Route::get('/api/bookings', [AdminController::class, 'getBookingEndpoint']);
    Route::put('/admin/pet-type/update', [AdminController::class, 'updatePetType']);
    Route::put('/admin/adminService/update', [AdminController::class, 'updateService']);
    Route::get('/admin/help-center', [ReportSuggestionsController::class, 'showHelp']);
});

// Default Route
Route::get('/', [UserController::class, 'index']);
Route::get('/help-center', [ReportSuggestionsController::class, 'showHelpCenter']);
Route::get('/about-us', [ReportSuggestionsController::class, 'showAboutUs']);
Route::post('help-center/add', [ReportSuggestionsController::class, 'storeReport']);

// Unauthorized Route
Route::get('/unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');
/******************************************************************* */
