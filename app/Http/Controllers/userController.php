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
        return redirect('/l');
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
        return redirect('/l');
    }
    public function connexion(Request $request){

        $this->validate($request, [
            'email' => "required|email",
            'password' => "required|min:6'",
        ]);

        $user=Users::where('email',$request->email)
            ->first();
            // ->get();
            // dd($user);

        if(!$user){
            return redirect('/re');
        } elseif (!password_verify($request->password,$user->password)) {
            return redirect('/l');
        }else{
            foreach ($user as $key => $value) {
                session()->put($key,$value);
                session()->save();
            }
            if($user->tag==0){
                return redirect('/c');
            }elseif($user->tag==1){
                return redirect('/j');
            }else{
                return redirect('/admin/settings');
            }
        }
    }
    public function showProfil(Request $request){
        // $infos= Users::where('id',session()->get('id'))->first();
        $infos= Users::where('id',1)->first();
        return view('/company/profil', compact('infos'));
    }
    public function updateProfil(Request $request){
        // $infos= Users::where('id',session()->get('id'))->first();
        $infos= Users::where('id',1)->first();
        return back();
    }
    public function deconnection(){
        session()->flush();
        return redirect('/');
    }

}
