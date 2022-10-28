<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    //
    public function saveCandidate(Request $request){
        $password=password_hash($request->passwordCandidate, PASSWORD_DEFAULT);
        Candidate::create([
            'name'=>$request->nameCandidate,
            'username'=>$request->usernameCandidate,
            'email'=>$request->emailCandidate,
            'password'=>$password,
            'country'=>null,
            'city'=>null,
            'region'=>null,
            'post_office_box'=>null,
            'social_link'=>null,
        ]);
        return view('login');
        

    }
}
