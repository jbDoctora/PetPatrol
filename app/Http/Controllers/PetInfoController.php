<?php

namespace App\Http\Controllers;

use App\Models\PetInfo;
use App\Models\AdminPetType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Input\Input;

class PetInfoController extends Controller
{
    //
    // public function index(){
    //     $petinfo = PetInfo::paginate(9);
    //     return view('owner.pet-info-index',[
    //         'petinfo' => $petinfo
    //     ]);
    // }
    // public function index(){
    //     return view('owner.pet-info-index',[
    //         'petinfo' => PetInfo::paginate(9)
    //     ]);
    // }
    public function index()
    {
        $petinfo = PetInfo::where('owner_id', auth()->id())->paginate(3);
        return view('owner.pet-info-index', compact('petinfo'));
    }
    public function create()
    {
        $adminPetType = AdminPetType::where('isPosted', 1)->get();
        return view('owner.pet-info-create', compact('adminPetType'));
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'pet_name' => 'required|unique:pet_info,pet_name,NULL,id,owner_id,' . auth()->id(),
            'years' => 'required',
            'months' => 'required',
            'breed' => 'required',
        ], [
            'name.unique' => 'The pet name already exists on your end.',
        ]);

        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('image', 'public');
        }
        $formFields['info'] = $request->input('info');
        $formFields['vaccine'] = $request->input('vaccine');
        $formFields['vaccine_list'] = $request->input('vaccine_list');
        $formFields['type'] = $request->input('type');
        $formFields['weight'] = $request->input('weight');
        $formFields['book_status'] = $request->input('book_status');
        $formFields['owner_id'] = auth()->id() ?? null;

        PetInfo::create($formFields);
        // $pet = new PetInfo($formFields);
        // $pet->save();

        return redirect('/pet-info')->with('message', 'Pet added successfully!');
    }
}
