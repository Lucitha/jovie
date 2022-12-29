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
            'posted_by'=>session()->get('id'),
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
        $company=\DB::table('users')
        ->select('*')
        ->where('id', session()->get('id'))
        ->first();
        return view('company/job', compact('categories','types','company'));
    }
    public function editJob($id){
        $update='';
        $getJobs=Job::select('*')
        ->where('id',[$id])
        ->first();
        return view('settings',compact('getJobs'));
    }
    public function updatePost(Request $request, $id){
        $get=Job::select('*')
        ->where('id',[$id])
        ->first();

        $start=date('Y-m-d H:i:s', strtotime($request->start_at));
        $end=date('Y-m-d H:i:s', strtotime($request->end_at));

        if( $request->salary_min && $request->salary_max){
            $salary=$request->salary_min.'-'.$request->salary_max;
        }else{
            $salary=null;
        }  

        $get->job_title=$request->title;
        $get->type_id=$request->type_id;
        $get->category_id=$request->category_id;
        $get->location=$request->location;
        $get->job_contact = $request->contact;
        $get->company_name = $request->company_name;
        $get->company_email = $request->company_email;
        $get->job_description = $request->description;
        $get->job_conditions = $request->conditions;
        $get->salary_range=$salary;
        $get->start_at=$start;
        $get->end_at=$end;
        $get->save();

        return redirect('/jobList');
    }
    public function showJob(Request $request){
        
        $date=date('Y-m-d H:i:s');
        $where = [['jobs.start_at', '<=', date('Y-m-d H:i:s')], ['jobs.end_at', '>=', date('Y-m-d H:i:s')]];
        $jobs= Job::select('jobs.*','types.id as typeID','types.type_title','categories.id as catID','categories.category_title','users.name')
            ->join('users','posted_by','=','users.id')
            ->join('types','type_id','=','types.id')
            ->join('categories','category_id','=','categories.id')
            ->where($where)
            ->get();
        return view('jobList', compact('jobs'));
    } 
    public function detailsJob($id){

        $detail= Job::select('jobs.*','types.id as typeID','categories.id as catID','types.type_title','categories.category_title')
        ->join('types','type_id','=','types.id')
        ->join('categories','category_id','=','categories.id')
        ->where('jobs.id',$id)
        ->first();
        $where = [['candidacies.candidate_id', session()->get('id')],['users.tag',0], ['jobs.id', $id]];
        $candidacy = \DB::table('candidacies')
        ->select('users.*', 'candidacies.*','jobs.*')
        ->join('jobs','job_id','=','job.id' )
        ->join('users','candidate_id','=','users.id' )
        ->where($where);

        return view('jobDetails', compact('detail','candidacy'));
    } 
    public function companyJob(Request $request){
        $jobs= Job::select('jobs.*','types.type_title','jobs.id as jID','users.name as posted')
        ->join('types','type_id','=','types.id')
        ->join('categories','category_id','=','categories.id')
        ->join('users','posted_by','=','users.id')
        ->where('posted_by',session()->get('id'))
        ->get();
        return view('company/listJob', compact('jobs'));
    } 
    public function editPost($id){
        // $output = '';
        $categories=\DB::table('categories')
                        ->select('*')
                        ->get();
        $types=\DB::table('types') 
                   ->select('*')
                   ->get();
        $edit = Job::where('id', $id)
                    ->first();
        $money= explode( '-',$edit->salary_range);
        $min = trim($money[0]);
        $max = trim($money[1]);
        $date=strtotime(date('Y-m-d H:i:s'));
        $start=strtotime($edit->start_at);
        $end=strtotime($edit->end_at);
        if($date>$start){
            $output =  '<div class="col-md-12 text-center">
                            <button type="submit" name="updateJob" id="updateJob" class="post-btn">
                                Post A Job
                            </button>
                        </div>';
        }
        return view('company/jobEdit', compact('edit','categories','types','money'));        
    }
    public function candidateJob(Request $request){
        $jobs= Job::select('*')
        ->join('types','type_id','=','types.id')
        ->join('categories','category_id','=','categories.id')
        ->join('candidacies','id','=','candidacies.job_id')
        ->where('candidacies.candidate_id',session()->get('id'));
        return view('/jobList', compact('jobs'));
    } 
    public function jobByCompany($id){
        $company = \DB::table('users')
                    ->select('*')
                    ->where('id',$id)
                    ->first();
        // dd($id);
        $jobs= Job::select('*','jobs.id as jID')
        ->join('types','type_id','=','types.id')
        ->join('categories','category_id','=','categories.id')
        ->join('users','posted_by','=','users.id')
        ->where('posted_by',$id)
        ->get();
        return view('listJob', compact('jobs','company'));
    } 
    public function jobByType($id){
        $filters= Job::select('jobs.*')
        ->join('types','type_id','=','types.id')
        ->where('type_id',$id);
        return view('/jobList', compact('filters'));
    } 
    public function jobByCategory($id){
        $filtres= Job::select('jobs.*')
        ->join('categories','category_id','=','categories.id')
        ->where('category_id',$id);
        return view('/jobList', compact('filtres'));
    } 
    public function jobByTypeCategory($type,$category){
        $jobs= Job::select('jobs.*')
        ->where('category_id',$type)
        ->where('category_id',$category);
        return view('/jobList', compact('jobs'));
    } 
    public function searching(){
        $categories=\DB::table('categories')
        ->select('*')
        ->get();
        
        $types=\DB::table('types')
        ->select('*')
        ->get();

        $jobs= Job::select('jobs.*')
        -> limit(5)
        ->get();
        return view('/search', compact('categories','types','jobs'));
    }



}
