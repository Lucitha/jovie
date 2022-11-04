<?php

namespace App\Http\Controllers;

use App\Models\Candidacy;
use Illuminate\Http\Request;

class CandidacyController extends Controller
{
    //
    public function saveCandidacy(Request $request,$id){
        $date=date('Y-m-d H:i:s', strtotime($request->apply_at));
        $verify=Candidacy::where('id',session()->get('id'))->first();
        if(!$verify){
            Candidacy::create([
                'resum'=>$request->resum,
                'contact'=>$request->contact,
                // 'candidate_id'=>session()->get('id'),
                'candidate_id'=>1,
                'job_id'=>$id,
                'apply_date'=>$date,            
            ]);
        }else{

        }
       
        return back();
    }
    public function showCandidacy(Request $request,$id){
        $list=Candidacy::select('*')
        ->join('jobs','job_id','=','jobs.id')
        ->join('users','jobs.company_id','=','users.id')
        // ->where('id',session()->get('id'))
        ->where('id',1)
        ->get();
       
       
        return back();
    }
}
