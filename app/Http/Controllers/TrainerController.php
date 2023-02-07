<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index(){
        return view('trainer.dashboard');
    }

    public function show(){
        return view('trainer.portfolio');
    }

    public function create(){
        return view('trainer.create-portfolio');
    }
}
