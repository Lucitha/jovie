<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function savetype(Request $request){
        \DB::table('type')
           ->insert(['title'=>$request->title,
                     'description'=>$request->description,
        ]);
    }
}
