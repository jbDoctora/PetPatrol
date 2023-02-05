<?php

//use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetInfoController;
use App\Http\Controllers\TrainerController;
use Symfony\Component\Routing\RequestContext;
use App\Http\Controllers\RequestTrainerController;

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
/******************************************************************* */
//OWNER_PET_INFO
Route::get('/pet-info', [PetInfoController::class, 'index'])->middleware('auth','isOwner');

Route::get('/pet/add-info', [PetInfoController::class, 'create'])->middleware('auth', 'isOwner');

Route::post('/pet/add-info/add', [PetInfoController::class, 'store']);

//OWNER
Route::get('/owner', [OwnerController::class, 'index'])->middleware('auth', 'isOwner');

Route::get('/book-trainer', [OwnerController::class, 'create'])->middleware('auth', 'isOwner');

Route::post('/book-trainer/add', [RequestTrainerController::class, 'store']);


/******************************************************************* */
//TRAINER
Route::get('/trainer', [TrainerController::class, 'index'])->middleware('auth', 'isTrainer');
/******************************************************************* */
// DEFAULT
Route::get('/', [UserController::class, 'index']);
/******************************************************************* */

//E change ni once maka create nag RequestController for "index"
Route::get('/request', function(){
    return view('owner.request');
});

//end of deletion

