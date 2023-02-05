<?php

namespace App\Http\Controllers;

use App\Models\PetInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OwnerController extends Controller
{
    public function index(){
        return view('owner.dashboard');
    }

    public function create(){
        $petinfo = PetInfo::where('owner_id', auth()->id())->paginate(9);
        return view('owner.book-trainer', compact('petinfo'));
    }
}
