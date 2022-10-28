<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function saveJob(Request $request){
        
        Job::create([
            'title'=>$request->title,
            'company_id'=>$request->company_id,
            'category'=>$request->category,
            'location'=>$request->location,
            'contact'=>$request->contact,
            'company_name'=>$request->company_name,
            'description'=>$request->description,
            'conditions'=>$request->conditions,

        ]);
        return view('');
        

    }
}
