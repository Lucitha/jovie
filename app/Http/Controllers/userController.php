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
            
            if($user->tag !=0 && $user->tag!=1){
                return redirect('/admin/settings');
            }else{
                return redirect('/profil');
            }
        }
    }
    public function showProfil(Request $request){
        // $infos= Users::where('id',session()->get('id'))->first();
        $info= Users::where('id',1)->first();
        if($info->tag==0){
            return view('/candidats/profils', compact('info'));
        }else{
            return view('/company/profil', compact('info'));
        }  
    }
    public function updateProfil(Request $request){
        // $infos= Users::where('id',session()->get('id'))->first();
        $infos= Users::where('id',1)->first();
        if($infos->tag==1){
            $infos->username=$request->username;
            $infos->email=$request->company_email;
            $infos->business_number=$request->business_number;
            $infos->post_office_box=$request->post_office_box;
            $infos->country=$request->country;
            $infos->city=$request->city;
            $infos->region=$request->region;
            $infos->save();
        }else{
            $infos->name=$request->name;
            $infos->username=$request->username;
            $infos->email=$request->email;
            $infos->country=$request->country;
            $infos->city=$request->city;
            $infos->region=$request->region;
            $infos->save();
        }
        return back();
    }
    public function updatePass(Request $request){
        // $infos= Users::where('id',session()->get('id'))->first();
        $infos= Users::where('id',1)->first();
        if(!password_verify($request->old_password,$infos->password)){
           
        }else{
            $password=password_hash($request->password, PASSWORD_DEFAULT);
            $infos->password=$password;
            $infos->save();
        }
 
        return back();
    }
    public function deconnection(){
        session()->flush();
        return redirect('/');
    }

}
