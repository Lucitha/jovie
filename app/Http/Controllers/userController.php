<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function saveCompany(Request $request){
        $password=password_hash($request->passwordCompany, PASSWORD_DEFAULT);
        Users::create([
            'name'=>$request->nameCompany,
            'email'=>$request->emailCompany,
            'password'=>$password,
            'tag'=>1,
        ]);
        return view('login');
    }

    public function saveCandidate(Request $request){
        $password=password_hash($request->passwordCandidate, PASSWORD_DEFAULT);
        Users::create([
            'name'=>$request->nameCandidate,
            'username'=>$request->usernameCandidate,
            'email'=>$request->emailCandidate,
            'password'=>$password,
            'tag'=>0,
        ]);
        return view('login');
        

    }
}
