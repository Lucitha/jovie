<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function saveCompany(Request $request){
        $this->validate($request, [
            'passwordCompany' => "required|min:6'",
            'passwordConfirm' => "required|min:6'",
        ]);
        if($request->passwordCompany == $request->passwordConfirm){
            $password=password_hash($request->passwordCompany, PASSWORD_DEFAULT);
            Users::create([
                'name'=>$request->nameCompany,
                'email'=>$request->emailCompany,
                'password'=>$password,
                'tag'=>1,
            ]);
        }
       
        return redirect('/connexion');
    }
    public function saveCandidate(Request $request){
        $this->validate($request, [
            'passwordCandidate' => "required|min:6'",
            'passwordConfirm' => "required|min:6'",
        ]);
        if($request->passwordCandidate == $request->passwordConfirm){
            $password=password_hash($request->passwordCandidate, PASSWORD_DEFAULT);
            Users::create([
                'name'=>$request->nameCandidate,
                'username'=>$request->usernameCandidate,
                'email'=>$request->emailCandidate,
                'password'=>$password,
                'tag'=>0,
            ]);
        }
        
        return redirect('/connexion');
    }
    public function connexion(Request $request){

        $this->validate($request, [
            'email' => "required|email",
            'password' => "required|min:6'",
        ]);

        $user=Users::where('email',$request->email)
            ->first();
        if(!$user){
            return redirect('/register');
        } elseif (!password_verify($request->password,$user->password)) {
            return redirect('/connexion');
        }else{
            $tab=[];
            
            // foreach ($user as $key=> $value) {
                session()->put('id',$user->id);
                session()->put('email',$user->email);
                session()->put('name',$user->name);
                session()->put('tag',$user->tag);
                session()->save();
            // }
            if($user->tag == 0 || $user->tag == 1){
              return redirect('/profil') ;
            }else{
                 return redirect('/admin/settings');
            }
        }
    }
    public function showProfil(){
        $info=Users::where('id',session()->get('id'))->first();
        if($info->tag==0){
            return view('/candidats/profils', compact('info'));
        }else{
            return view('/company/profil', compact('info'));
        }  
    }
    public function updateProfil(Request $request){
        dd($request);
        $infos= Users::where('id',session()->get('id'))->first();
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
    public function socialLink(Request $request){
        // $infos= Users::where('id',session()->get('id'))->first();
        $link=[];
        $link['facebook']=$request->facebook;
        $link['twitter']=$request->twitter;
        $link['linkedin']=$request->linkedin;
        $link['github']=$request->github;
        $link['other']=$request->other;
        dd(session()->all());
        // $infos= Users::where('id',1)->first();
        // if($infos->tag==1){
        //     $infos->username=$request->username;
        //     $infos->email=$request->company_email;
        //     $infos->business_number=$request->business_number;
        //     $infos->post_office_box=$request->post_office_box;
        //     $infos->country=$request->country;
        //     $infos->city=$request->city;
        //     $infos->region=$request->region;
        //     $infos->save();
        // }else{
        //     $infos->name=$request->name;
        //     $infos->username=$request->username;
        //     $infos->email=$request->email;
        //     $infos->country=$request->country;
        //     $infos->city=$request->city;
        //     $infos->region=$request->region;
        //     $infos->save();
        // }
        return back();
    }
    public function updatePass(Request $request){
        $infos= Users::where('id',session()->get('id'))->first();
        if(!password_verify($request->old_password,$infos->password)){
           
        }elseif(password_verify($request->old_password,$infos->password) && ($infos->confirm_password ==  $infos->password)){
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
