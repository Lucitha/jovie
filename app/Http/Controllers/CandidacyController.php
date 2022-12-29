<?php

namespace App\Http\Controllers;

use App\Models\Candidacy;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class CandidacyController extends Controller
{
    //apply a Job
    public function saveCandidacy(Request $request,$id){
        $date=date('Y-m-d H:i:s');
        $me = \DB::table('jobs')
        ->select('*')
        ->where('id',$id)
        ->where('posted_by',session()->get('id'))
        ->first();
        $verify=Candidacy::where('id',session()->get('id'))->first();
        $path = $request->file('cv')->store('resum', 'public');
        $file = explode('/',$path)[sizeof(explode('/',$path))-1];
        if(!$verify && !$me){
            Candidacy::create([
                'resum'=>$file,
                'contact'=>$request->phone,
                'candidate_id'=>session()->get('id'),
                'job_id'=>$id,
                'apply_date'=>$date,            
            ]);
        }
       
        return back();
    }
        //All candidacies by job
    public function showCandidacies($id){
        $infos='';
        $candidacies=Candidacy::select('*','users.*','jobs.*','users.id as uID','candidacies.id as cID','jobs.id as jID')
        ->join('jobs','job_id','=','jobs.id')
        ->join('users','candidate_id','=','users.id')
        ->where('posted_by',session()->get('id'))
        ->where('jobs.id',$id)
        ->get();
        return view('company/candidacies',compact('candidacies','infos'));
       
    }
    public function candidacie($id){
        $infos= Candidacy::select('users.*', 'jobs.*','candidacies.*')
                        ->join('users', 'candidate_id','users.id')
                        ->join('jobs','job_id','jobs.id')
                        ->where('candidacies.id',$id)
                        ->get();
        return view('company/candidacies',compact('infos'));
    }
        //show all job applying by candidate
    public function showApply() {
        $candidacies=Candidacy::select('*','users.*','jobs.*','users.id as uID','jobs.id as jID')
        ->join('jobs','job_id','=','jobs.id')
        ->join('users','candidate_id','=','users.id')
        ->where('candidate_id',session()->get('id'))
        ->get();
        $apply_date=date('d-m-Y H:i:s',$candidacies->apply_date);
        return view('candidats/myApply',compact('candidacies','apply_date'));
    }
    public function resum($id){
        $candidacy = Candidacy::select('*')
            ->where('id', $id)
            ->first();
        $resum = "/resum" . "/" . $candidacy->resum;
        
        echo $resum;
        exit;
        // return response()->json(['statut' => 0, 'path' => $resum]);
        
    }
    
  
}
