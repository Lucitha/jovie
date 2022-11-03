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
    public function login(Request $request){
        $this->validate($request, [
            'email' => "required|email",
            'password' => "required|min:6'",
        ]);

        $user=Users::where('email',$request->email)
            ->first();

        if(!$user){
            return redirect('/re');
        } elseif (!password_verify($request->password,$user->password)) {
            return redirect('/');
        }else{
            foreach ($user as $key => $value) {
                session()->put($key,$value);
                session()->save();
            }
            if($user->tag==0){
                return view('/c');
            }else if($user->tag==1){
                return view('/j');
            }else{
                return redirect('/admin/settings');
            }
        }
    }
    public function deconnection(){
        session()->flush();
        return redirect('/');
    }

}
