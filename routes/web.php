<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Foundation\Auth\User;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetInfoController;
use App\Http\Controllers\TrainerController;
use Symfony\Component\Routing\RequestContext;
use App\Http\Controllers\RequestTrainerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TrainingDetailsController;

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

// ALL USERS


Route::get('/register-owner', [UserController::class, 'create'])->middleware('guest');

Route::get('/register-trainer', [UserController::class, 'createNew'])->middleware('guest');

Route::post('/users', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/profile', [UserController::class, 'edit'])->middleware('auth');

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

/******************************************************************* */
//OWNER_PET_INFO
Route::get('/pet-info', [PetInfoController::class, 'index'])->middleware('auth', 'verified', 'isOwner');

Route::get('/pet/add-info', [PetInfoController::class, 'create'])->middleware('auth', 'verified', 'isOwner');

Route::post('/pet/add-info/add', [PetInfoController::class, 'store']);

//OWNER
Route::get('/owner', [OwnerController::class, 'index'])->middleware('auth', 'verified', 'isOwner');

Route::get('/book-trainer', [OwnerController::class, 'create'])->middleware('auth', 'verified', 'isOwner');

Route::post('/book-trainer/add', [RequestTrainerController::class, 'store']);

Route::get('/request', [RequestTrainerController::class, 'index'])->middleware('auth', 'verified', 'isOwner');

Route::get('/show-matched/trainerInfo/{user_id}', [OwnerController::class, "showTrainerInfo"])->middleware('auth', 'verified', 'isOwner');

Route::get('/show-matched/{request_id}', [OwnerController::class, 'show'])->middleware('auth', 'verified', 'isOwner')->name('show-matched');

Route::post('/show-matched/book', [BookingController::class, 'store']);

Route::get('/bookings', [BookingController::class, "show"])->middleware('auth', 'verified', 'isOwner');

Route::get('/show-matched/training-plan/{service_id}', [OwnerController::class, 'showTraining'])->middleware('auth', 'verified', 'isOwner');

/******************************************************************* */
//TRAINER
Route::get('/trainer', [TrainerController::class, 'index'])->middleware('auth', 'isTrainer');

Route::get('/trainer/bookings', [TrainerController::class, 'showBooking'])->middleware('auth', 'isTrainer');

Route::get('/trainer/portfolio', [TrainerController::class, 'show'])->middleware('auth', 'isTrainer');

Route::get('/trainer/portfolio/create', [TrainerController::class, 'create'])->middleware('auth', 'isTrainer');

Route::post('/trainer/portfolio/add', [TrainerController::class, 'store']);

Route::get('/trainer/service/add', [TrainerController::class, 'showService'])->middleware('auth', 'isTrainer');

Route::post('/trainer/service/{service_id}/add-service/add', [TrainingDetailsController::class, 'store']);

Route::get('/trainer/service/add-service/{service_id}', [TrainingDetailsController::class, 'create'])->middleware('auth', 'isTrainer');

Route::post('/trainer/service/add-service/addService', [ServiceController::class, 'store']);

/******************************************************************* */

// DEFAULT
Route::get('/', [UserController::class, 'index']);
/******************************************************************* */
