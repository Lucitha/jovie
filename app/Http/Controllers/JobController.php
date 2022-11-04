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
            'job_title'=>$request->title,
            'type_id'=>$request->type_id,
            'category_id'=>$request->category_id,
            'location'=>$request->location,
            'job_contact'=>$request->contact,
            'company_name'=>$request->company_name,
            'company_email'=>$request->company_email,
            'job_description'=>$request->description,
            'job_conditions'=>$request->conditions,
            'salary_range'=>$salary,
            'start_at'=>strtotime($request->start_at),
            'end_at'=>strtotime($request->end_at),
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
    public function updateJob(Request $request, $id){


    }
    public function editJob($id){
        $getId='';
        $getJobs=Job::select('*')
            ->where('id',[$id]);
            return view('',compact('getJobs'));
    }

    public function showJob(Request $request){
        $jobs= Job::select('*')
        ->join('types','type_id','=','types.id')
        ->join('cattegories','category_id','=','cattegories.id');
        return view('jobList', compact('jobs'));
    } 
    public function companyJob(Request $request){
        $jobs= Job::select('*')
        ->join('types','type_id','=','types.id')
        ->join('categories','category_id','=','categories.id')
        ->where('companies.id',1);
        return view('/jobList', compact('jobs'));
    } 
    public function candidateJob(Request $request){
        $jobs= Job::select('*')
        ->join('types','type_id','=','types.id')
        ->join('categories','category_id','=','categories.id')
        ->join('candidacies','id','=','candidacies.job_id')
        ->where('candidacies.candidate_id',1);
        return view('/jobList', compact('jobs'));
    } 
}
