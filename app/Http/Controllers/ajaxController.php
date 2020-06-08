<?php

namespace App\Http\Controllers;

use App\specialities;
use Illuminate\Http\Request;




class ajaxController extends Controller
{
    public function user_speciality(Request $request){
        
        if ($request->ajax()) {
            $speciality = specialities::findOrFail($request->speciality );
            $users = $speciality->users;
            return response()->json($users);
        }
    }
}
