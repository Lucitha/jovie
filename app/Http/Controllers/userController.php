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
            'passwordCompany' => "min:6|required_with:passwordConfirm|same:passwordConfirm",
            'pConfirm' => "required|min:6",
        ]);
        if($request->passwordCompany == $request->pConfirm){
            $password=password_hash($request->passwordCompany, PASSWORD_DEFAULT);
                        
            Users::create([
                'users_name'=>$request->nameCompany,
                'users_email'=>$request->emailCompany,
                'users_password'=>$password,
                'users_flag'=>0,
                'roles_id'=>1,
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
            Users::create([
                'users_name'=>$request->nameCandidate,
                'users_email'=>$request->emailCandidate,
                'users_password'=>$password,
                'users_flag'=>0,
                'roles_id'=>2,
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
        } elseif (!password_verify($request->password,$user->password)) {
            return back()->with('error','Veuillez vérifier vos identifiants de connexion');
        }else{
            // dd(json_decode($user->name)->email );
            $tab=[];
            
            session()->put('id',$user->id);
            session()->put('users_email',$user->users_email);
            session()->put('users_name',$user->users_name);
            session()->put('users_flag',$user->users_flag);
            session()->put('roles_id',$user->roles_id);
            session()->save();

            if($user->tag == 0 || $user->tag == 1){
              return redirect('/profil')->with('info','Connexion établie avec succès'); ;
            }else{
                 return redirect('/admin/settings');
            }
        }
    }

    public function showProfil(){
        $info=Users::where('id',session()->get('id'))->first();
        if($info->users_flag==1){
            return view('/candidats/profils', compact('info'));
        }elseif($info->users_flag==1){
            return view('/company/profil', compact('info'));
        }else{
            return view('/admin/settings');
        }  
    }
    public function updateProfil(Request $request){
        // dd($request);
        $infos= Users::where('id',session()->get('id'))->first();
        if($infos->tag==1){
            $infos->username=$request->job;
            $infos->name=$request->company_name;
            $infos->email=$request->company_email;
            $infos->business_number=$request->business_number;
            $infos->post_office_box=$request->post_office_box;
            $infos->country=$request->country;
            $infos->city=$request->city;
            $infos->region=$request->region;
            $infos->save();
        }else{
            $infos->name=$request->name;
            $infos->username=$request->job;
            $infos->email=$request->email;
            $infos->post_office_box=$request->post_office_box;
            $infos->country=$request->country;
            $infos->city=$request->city;
            $infos->region=$request->region;
            $infos->save();
        }
        return back();
    }
    public function socialLink(Request $request){
        $link=[];
        $link['facebook']=$request->facebook;
        $link['twitter']=$request->twitter;
        $link['linkedin']=$request->linkedin;
        $link['github']=$request->github;
        $link['other']=$request->other;
        //     $link->save();
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
    public function showCandidates(){
        $candidates= Users::where('roles_id',1)->paginate(1);
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
        // Hash::check($request->token, $user->email, []);

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

        // $hash=hash('md5', $request->email);
        $hash=Crypt::encryptString($request->email);

        $info = [
                'NAME' => $user->name,
                'LINK' => $user->id.'/'.$hash,
                ];

        
        if($user){
            \Mail::to($user->email)->send(new Notif($info));
            // dd("Email is Sent.");
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
