<?php

namespace App\Http\Controllers;

use App\Models\Candidacy;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class CandidacyController extends Controller
{
    //
    public function saveCandidacy(Request $request,$id){
        $date=date('Y-m-d H:i:s');
        $verify=Candidacy::where('id',session()->get('id'))->first();
        $path = $request->file('cv')->store('resum', 'public');
        $file = explode('/',$path)[sizeof(explode('/',$path))-1];
        // dd($path);
        // if(!$verify){
            Candidacy::create([
                'resum'=>$file,
                'contact'=>$request->phone,
                // 'candidate_id'=>session()->get('id'),
                'candidate_id'=>1,
                'job_id'=>$id,
                'apply_date'=>$date,            
            ]);
        // }
       
        return back();
    }
    public function showCandidacies($id){
        $infos='';
        $candidacies=Candidacy::select('*','users.*','jobs.*','users.id as uID','jobs.id as jID')
        ->join('jobs','job_id','=','jobs.id')
        ->join('users','candidate_id','=','users.id')
        // ->where('company_id',session()->get('id'))
        ->where('posted_by',1)
        ->where('jobs.id',$id)
        ->get();
        return view('company/candidacies',compact('candidacies','infos'));
        // $r='poi'.$id;
        //         return view('company/candidacies');
    }
    public function candidacie($id){
        $infos= Candidacy::select('users.*', 'jobs.*','candidacies.*')
                        ->join('users', 'candidate_id','users.id')
                        ->join('jobs','job_id','jobs.id')
                        ->where()
                        ->get();
        return view('company/candidacies',compact('infos'));
    }
    public function showApply() {
        $candidacies=Candidacy::select('*','users.*','jobs.*','users.id as uID','jobs.id as jID')
        ->join('jobs','job_id','=','jobs.id')
        ->join('users','candidate_id','=','users.id')
        // ->where('candidate_id',session()->get('id'))
        ->where('candidate_id',1)
        ->get();
        // dd($candidacies);
        return view('candidats/myApply',compact('candidacies'));
    }
    
  
}
