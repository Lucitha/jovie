<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function saveCompany(Request $request){
        $password=password_hash($request->passwordCompany, PASSWORD_DEFAULT);
        Company::create([
            'name'=>$request->nameCompany,
            'email'=>$request->emailCompany,
            'password'=>$password
        ]);
        return view('login');
    }
}
