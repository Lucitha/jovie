<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminController extends Controller
{
    //
    public function getSettings(Request $request){
        $categories=\DB::table('categories')
                    ->select('*')
                    ->get();
        $types=\DB::table('types')
                    ->select('*')
                    ->get();
        return  view('admin/settings',compact('categories','types'));
    }
    public function saveType(Request $request){
        \DB::table('types')
           ->insert(['types_name'=>$request->type_title,
                     'types_description'=>$request->type_description,
                     'created_at'=>date('Y-m-d H:i:s'),
        ]);
        return back();
    }
    public function saveCategory(Request $request){
        \DB::table('categories')
           ->insert(['categories_name'=>$request->category_title,
                     'categories_description'=>$request->category_description,
                     'created_at'=>date('Y-m-d H:i:s'),
        ]);
        return back();
    }

    public function deleteType($id){
        \DB::table('types')
        ->where('id',[$id])
        ->delete();
        return back();
    }
    public function deleteCategorie($id){
        \DB::table('categories')
        ->where('id',[$id])
        ->delete();
        return back();
    }
    public function deleteJob($id){
        \DB::table('jobs')
        ->where('id',[$id])
        ->delete();
        return back();
    }
    public function deleteCompany($id){
        \DB::table('companies')
        ->where('id',[$id])
        ->delete();
        return back();
    }
    public function deleteCandidacie($id){
        \DB::table('candidacies')
        ->where('id',[$id])
        ->delete();
        return back();
    }
    public function deleteCandidate($id){
        \DB::table('candidate')
        ->join('candidacies','id','=','candidacies.candidate_id',)
        ->where('id',[$id])
        ->delete();
        return back();
    }
}

?>