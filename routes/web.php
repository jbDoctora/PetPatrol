<?php

//use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetInfoController;
use App\Http\Controllers\TrainerController;
use Symfony\Component\Routing\RequestContext;
use App\Http\Controllers\RequestTrainerController;
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
/******************************************************************* */
//OWNER_PET_INFO
Route::get('/pet-info', [PetInfoController::class, 'index'])->middleware('auth','isOwner');

Route::get('/pet/add-info', [PetInfoController::class, 'create'])->middleware('auth', 'isOwner');

Route::post('/pet/add-info/add', [PetInfoController::class, 'store']);

//OWNER
Route::get('/owner', [OwnerController::class, 'index'])->middleware('auth', 'isOwner');

Route::get('/book-trainer', [OwnerController::class, 'create'])->middleware('auth', 'isOwner');

Route::post('/book-trainer/add', [RequestTrainerController::class, 'store']);

Route::get('/request', [RequestTrainerController::class, 'index'])->middleware('auth', 'isOwner');

/******************************************************************* */
//TRAINER
Route::get('/trainer', [TrainerController::class, 'index'])->middleware('auth', 'isTrainer');

Route::get('/trainer/portfolio', [TrainerController::class, 'show'])->middleware('auth', 'isTrainer');

Route::get('/trainer/portfolio/create', [TrainerController::class, 'create'])->middleware('auth', 'isTrainer');

Route::post('/trainer/portfolio/add', [TrainerController::class, 'store']);

Route::get('/trainer/service/add', [TrainerController::class, 'showService'])->middleware('auth', 'isTrainer');

Route::post('/trainer/service/add-service', [TrainingDetailsController::class, 'store']);
/******************************************************************* */

// DEFAULT
Route::get('/', [UserController::class, 'index']);
/******************************************************************* */


