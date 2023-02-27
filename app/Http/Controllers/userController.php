<?php

namespace App\Http\Controllers;

use App\Mail\Notif;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php';


class userController extends Controller
{
    //
    public function saveCompany(Request $request){
        // dd($request);
        session()->put('currentTab', 'company');
        session()->save();
        $this->validate($request, [
            'nameCompany'=> "required",
            'emailCompany' => "required|email",
            'business_number' => "required",
            'passwordCompany' => "min:6|required_with:pConfirm|same:pConfirm",
            'pConfirm' => "required|min:6",
        ]);
        if($request->passwordCompany == $request->pConfirm){
            $password=password_hash($request->passwordCompany, PASSWORD_DEFAULT);
            $link=[];
            $link['webSite']="";
            $link['facebook']="";
            $link['twitter']="";
            $link['linkedin']="";
            $link['github']="";
            $link['other']="";
            $social=json_encode($link);
                        
            Users::create([
                'users_name'=>$request->nameCompany,
                'users_email'=>$request->emailCompany,
                'business_number'=>$request->business_number,
                'users_social_link'=>$social,
                'users_password'=>$password,
                'users_flag'=>0,
                'roles_id'=>2,
            ]);
        }
       
        return redirect('/connexion');
    }
    public function saveCandidate(Request $request){
        session()->put('currentTab', '');
        session()->save();
        $validate = $this->validate($request, [
            'nameCandidate'=> "required",
            'emailCandidate' => "required|email",
            'passwordCandidate' => "min:6|required_with:passwordConfirm|same:passwordConfirm",
            'passwordConfirm' => "required|min:6",
        ]);
        if($request->passwordCandidate == $request->passwordConfirm){
            $password=password_hash($request->passwordCandidate, PASSWORD_DEFAULT);
            $link=[];
            $link['webSite']="";
            $link['facebook']="";
            $link['twitter']="";
            $link['linkedin']="";
            $link['github']="";
            $link['other']="";
            $social=json_encode($link);
            Users::create([
                'users_name'=>$request->nameCandidate,
                'users_email'=>$request->emailCandidate,
                'users_social_link'=>$social,
                'users_password'=>$password,
                'users_flag'=>0,
                'roles_id'=>3,
            ]);
        }
        
        return redirect('/connexion');
    }
    public function connexion(Request $request){

        $this->validate($request, [
            'email' => "required|email",
            'password' => "required|min:6'",
        ]);

        $user=Users::where('users_email',$request->email)
            ->first();
        if(!$user){
            return back()->with('warning','Veuillez créer un compte pour avoir accès à cette plateforme');
        } elseif (!password_verify($request->password,$user->users_password)) {
            return back()->with('error','Veuillez vérifier vos identifiants de connexion');
        }else{
            $tab=[];
            
            session()->put('id',$user->id);
            session()->put('users_email',$user->users_email);
            session()->put('users_name',$user->users_name);
            session()->put('roles_id',$user->roles_id);
            session()->save();

            if($user->roles_id ==1){
                return redirect('/admin/settings')->with('info','Connexion établie avec succès');
            }else{
                return redirect('/profil')->with('info','Connexion établie avec succès'); 
            }
        }
    }

    public function showProfil(){
        $info=Users::where('id',session()->get('id'))->first();
        if($info->roles_id==3){
            return view('/candidats/profils', compact('info'));
        }elseif($info->roles_id==2){
            return view('/company/profil', compact('info'));
        }else{
            return view('/admin/settings');
        }  
    }
    public function updateProfil(Request $request){

        $infos= Users::where('id',session()->get('id'))->first();
        $infos->users_name=$request->users_name;
        $infos->users_email=$request->users_email;
        $infos->username=$request->username;
        $infos->users_phone=$request->users_phone;
        $infos->users_address=$request->users_address;
        $infos->users_jobs=$request->users_jobs;
        $infos->users_post_office_box=$request->users_post_office_box;
        if($infos->roles_id==2){
            $infos->business_number=$request->business_number;
        }else{
            $infos->username=$request->username;
        }
        $infos->save();
        return back();
    }
    public function socialLink(Request $request){
        $social= Users::where('id',session()->get('id'))->first();
        
        $link=[];
        $link['webSite']=$request->webSite;
        $link['facebook']=$request->facebook;
        $link['twitter']=$request->twitter;
        $link['linkedin']=$request->linkedin;
        $link['github']=$request->github;
        $link['other']=$request->other;
        $social->users_social_link=json_encode($link);
        // dd($social);
        $social->save();

        return back();
    }
    public function updatePass(Request $request){
        $this->validate($request, [
            'password' => "min:6|required_with:confirm_password|same:confirm_password",
            'confirm_password' => "required|min:6",
        ]);
        $infos= Users::where('id',session()->get('id'))->first();
        if(!password_verify($request->old_password,$infos->password)){
           
        }elseif(password_verify($request->old_password,$infos->password) && ($infos->confirm_password ==  $infos->password)){
            $password=password_hash($request->password, PASSWORD_DEFAULT);
            $infos->password=$password;
            $infos->save();
        }
 
        return back();
    }
    public function showCandidates(){
        $candidates= Users::where('roles_id',3)->paginate(1);
        return view('candidates', compact('candidates'));
    }
    public function showCompanies(){
        $companies= Users::where('roles_id',2)->paginate(1);
        return view('companies', compact('companies'));
    }
   
    public function resetView($id,$link){
        $user=Users::where('id',$id)->first();
        return view('reset',compact('id','link','user'));
    }
    public function reset(Request $request){
        $this->validate($request, [
            'password' => "min:6|required_with:passwordConfirm|same:passwordConfirm",
            'passwordConfirm' => "required|min:6",
        ]);
        $user=Users::where('id',$request->token)
        ->first();

        $password=password_hash($request->password, PASSWORD_DEFAULT);
        $user->password=$password;
        $user->save();
        return redirect('/connexion')->with('info','Mot de passe réinitialisé avec succès. Utilisez vos nouveaux identifiants pour vous connecter !');
    }
    public function resetPassword(Request $request){
        $this->validate($request, [
            'email' => "required|email",
        ]);
        $user=Users::where('email',$request->email)
        ->first();
        
        $info = [];
        $hash=Crypt::encryptString($request->email);

        $info = [
                'NAME' => $user->name,
                'LINK' => $user->id.'/'.$hash,
                ];

        
        if($user){
            \Mail::to($user->email)->send(new Notif($info));
        }
        
        return back()->with('info','Veuillez consulter vos mails pour réinitialiser votre mot de passe. Merci !');
    }
    public function deconnection(){
        session()->flush();
        return redirect('/');
    }



    // $mail = new PHPMailer(true);

    // try {
    //     //Server settings
    //     $mail->SMTPDebug = 0;                      //Enable verbose debug output
    //     $mail->isSMTP();                                            //Send using SMTP
    //     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    //     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //     $mail->Username   = 'koukeprince@gmail.com';                     //SMTP username
    //     $mail->Password   = 'axlofgzaanrcnoop';                               //SMTP password
    //     $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    //     $mail->Port       = 587;                                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //     $info = [
    //     'NAME' => $user->name,
    //     'LINK' => $user->id.'/'.$hash,
    //     ];

       

        //Recipients
        // $mail->setFrom('koukeprince@gmail.com' , 'JOVIE');
        // $mail->addAddress($user->email);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        // $mail->isHTML(true);                                  //Set email format to HTML
        // $mail->Subject = 'Password Reset';
        // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        // $mail->send(Notif($info));
    //     echo 'Message has been sent';
    // } catch (Exception $e) {
    //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //     dd($e);
    //     die;
    // }

}
