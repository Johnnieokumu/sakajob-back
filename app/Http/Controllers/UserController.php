<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //create User
    public function createUser(Request $request){
        $request->validate([
            'full_name'=>'required',
            'email'=>'required',
            'curriculum_vitae'=>'required',
            'certificates'=>'required',
            'recommendation_letter'=>'required',
            
        ]);
        $user = User::create([
            'full_name'=>$request->full_name,
            'email'=>$request->email,
            'curriculum_vitae'=>$request->curriculum_vitae,
            'certificates'=>$request->certificates,
            'recommendation_letter'=>$request->recommendation_letter,
        ]);
    }
    
}
