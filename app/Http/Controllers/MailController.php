<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    //
    public function index(){
       $res =  Mail::raw('邮件内容',function($msg){
            $msg->from('phpoldfarmer@126.com','get123');
            $msg->subject('邮件标题');
            $msg->to('115056465@qq.com');
        });
        var_dump($res);
        
        //第一个参数mail指mail.blade.php
        //第二个参数是传入mail.blade.php中的参数名与值
        $res =  Mail::send('mail',['name'=>'1234'],function($msg){  
                $msg->from('phpoldfarmer@126.com','get123');
            $msg->subject('邮件标题');
            $msg->to('115056465@qq.com');
        });
        var_dump($res);
        
    }
}
