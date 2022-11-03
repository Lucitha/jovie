<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function saveJob(Request $request){
        if( $request->end_at && $request->end_at){
            $salary=$request->end_at.'-'.$request->end_at;
        }else{
            $salary=null;
        }
        
        Job::create([
            'posted_by'=>1,
            'title'=>$request->title,
            'type_id'=>$request->type_id,
            'category_id'=>$request->category_id,
            'location'=>$request->location,
            'contact'=>$request->contact,
            'company_name'=>$request->company_name,
            'company_email'=>$request->company_email,
            'description'=>$request->description,
            'conditions'=>$request->conditions,
            'salary_range'=>$salary,
            'start_at'=>$request->start_at,
            'end_at'=>$request->end_at,
        ]);
        return back();
        

    }
     
    public function newJob(Request $request){
        $categories=\DB::table('categories')
        ->select('*')
        ->get();
        $types=\DB::table('types')
        ->select('*')
        ->get();
        return view('company/job', compact('categories','types'));
    }
}
