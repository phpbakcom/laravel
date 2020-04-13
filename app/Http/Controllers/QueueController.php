<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmail;
use Carbon\Carbon;

class QueueController extends Controller
{
    //
    public function queue(){
        //for($i=0;$i<10;$i++){
      //  $var = dispatch((new SendEmail('374364384@qq.com'))->delay(Carbon::now()->addMinutes(10)));
       // $var = dispatch((new SendEmail('374364384@qq.com'))->onQueue('MyQueue'));
        $var = dispatch((new SendEmail('374364384@qq.com'))->onConnection('database')->onQueue('MyQueue')); //连接数据库
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
        //}
    }
}
