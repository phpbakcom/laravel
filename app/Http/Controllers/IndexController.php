<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class IndexController extends Controller
{
    //
    public function index(){
        echo 'index'.time();
    }
    public function index2(){
        echo 'index2'.time();
    }
    public function index3($id){
        echo 'index3'.time().$id;
    }
    public function info(){
       return Member::info();
       // return View('info',['name'=>'php']);
    }
    public function info2(){
        return View('info');
    }
}
