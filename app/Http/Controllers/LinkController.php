<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LinkController extends Controller
{
    //
    public function index(){
        $res = DB::table('l_link')->get();
        //dd($res);
        return view('link.index',['links'=>$res]);
    }
}
