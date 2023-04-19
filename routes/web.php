<?php

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PetInfoController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TrainerController;
use Symfony\Component\Routing\RequestContext;
use App\Http\Controllers\RequestTrainerController;
use App\Http\Controllers\TrainingDetailsController;
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

Route::put('/notifications/{notification}', function (Notification $notification) {
    $notification->markAsRead();
    return redirect('/bookings');
})->name('notifications.markAsRead');

Route::get('/trainer/waiting-approval', [TrainerController::class, 'showWaitingApproval'])->middleware('auth');

// Trainer Routes
Route::middleware(['auth', 'isTrainer', 'checkApproval'])->group(function () {
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
    Route::get('/trainer/service/add', [TrainerController::class, 'showService']);
    Route::get('/settings/payment', [TrainerController::class, 'showPayment']);
    Route::put('/settings/payment/{id}', [TrainerController::class, 'updatePayment']);
    Route::post('/trainer/service/{service_id}/add-service/add', [TrainingDetailsController::class, 'store']);
    Route::get('/trainer/service/add-service/{service_id}', [TrainingDetailsController::class, 'create']);
    Route::post('/trainer/service/add-service/addService', [ServiceController::class, 'store']);
    Route::get('/events', [TrainerController::class, 'getEvents']);
    Route::delete('/trainer/service/delete/{id}', [ServiceController::class, 'destroy']);
});

// Owner Routes
Route::middleware(['auth', 'verified', 'isOwner'])->group(function () {
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
    Route::delete('/request/delete/{request_id}', [OwnerController::class, 'destroyRequest']);
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
});

// Default Route
Route::get('/', [UserController::class, 'index']);

// Unauthorized Route
Route::get('/unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');
/******************************************************************* */
