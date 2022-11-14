<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function saveJob(Request $request){
        if( $request->salary_min && $request->salary_max){
            $salary=$request->salary_min.'-'.$request->salary_max;
        }else{
            $salary=null;
        }
        $start=date('Y-m-d H:i:s', strtotime($request->start_at));
        $end=date('Y-m-d H:i:s', strtotime($request->end_at));

        Job::create([
            // 'posted_by'=>session()->get('id'),
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
            'start_at'=>$start,
            'end_at'=>$end,
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
    public function editJob($id){
        $update='';
        $getJobs=Job::select('*')
        ->where('id',[$id])
        ->first();
        return view('settings',compact('getJobs'));
    }
    public function updateJob(Request $request, $id){
        $update='';
        $getJobs=Job::select('*')
        ->where('id',[$id])
        ->first();
        return view('',compact('getJobs'));


    }
    public function showJob(Request $request){
        $jobs= Job::select('jobs.*','types.id as typeID','types.type_title','categories.id as catID','categories.category_title','users.name')
            ->join('users','posted_by','=','users.id')
            ->join('types','type_id','=','types.id')
            ->join('categories','category_id','=','categories.id')
            ->get();
            // dd($jobs);
        return view('jobList', compact('jobs'));
    } 
    public function detailsJob($id){
        $detail= Job::select('jobs.*','types.id as typeID','categories.id as catID','types.type_title','categories.category_title')
        ->join('types','type_id','=','types.id')
        ->join('categories','category_id','=','categories.id')
        ->where('jobs.id',$id)
        ->first();
        // dd($detail);
        return view('jobDetails', compact('detail'));
    } 
    public function companyJob(Request $request){
        $jobs= Job::select('jobs.*','types.type_title','jobs.id as jID')
        ->join('types','type_id','=','types.id')
        ->join('categories','category_id','=','categories.id')
        // ->where('posted_by',session()->get('id'))
        ->where('posted_by',1)
        ->get();
        return view('company/listJob', compact('jobs'));
    } 
    public function candidateJob(Request $request){
        $jobs= Job::select('*')
        ->join('types','type_id','=','types.id')
        ->join('categories','category_id','=','categories.id')
        ->join('candidacies','id','=','candidacies.job_id')
        ->where('candidacies.candidate_id',1)
        ;
        return view('/jobList', compact('jobs'));
    } 
}
