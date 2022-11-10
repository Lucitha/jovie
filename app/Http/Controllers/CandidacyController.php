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
        // }else{

        // }
       
        return back();
    }
    public function showJobCandidacies(Request $request,$id){
        $list=Candidacy::select('*','users.*','jobs.*','users.id as uID','jobs.id as jID')
        ->join('jobs','job_id','=','jobs.id')
        ->join('users','jobs.company_id','=','users.id')
        // ->where('company_id',session()->get('id'))
        ->where('id',1)
        ->get();
       
       
        return view('', compact('list',));
    }
    public function showMyApply(Request $request,$id){
        $list=Candidacy::select('*','users.*','jobs.*','users.id as uID','jobs.id as jID')
        ->join('jobs','job_id','=','jobs.id')
        ->join('users','candidate_id','=','users.id')
        // ->where('candidate_id',session()->get('id'))
        ->where('id',1)
        ->get();
       
       
        return view('', compact('list',));
    }
}
