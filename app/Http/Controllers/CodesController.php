<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Facades\Session;
use App\Tools\Validate\ValidateCode;

class CodesController extends Controller
{
    //
    public function index(){
        return view('codes.index');
    }
    public function code(){
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        Session::put('milkcaptcha', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
    public function checkcode(Request $request){
        $res = $request->all();
        $captcha=$request->input('captcha');
        // dd($res);
        //echo $captcha;

        if (strtolower(Session::get('milkcaptcha')) == strtolower($captcha)) {
            //用户输入验证码正确
            return Session::get('milkcaptcha').'|'.$captcha.'| code true';
        } else {
            //用户输入验证码错误
            return Session::get('milkcaptcha').'|'.$captcha.'| code error';
        }

        // return 'checkcode';
    }
    public function code2(){
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(5);
        // 生成验证码图片的Builder对象,配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色25,25,112
        $builder->setBackgroundColor(25, 25, 112);
        // 设置倾斜角度
        $builder->setMaxAngle(25);
        // 设置验证码后面最大行数
        $builder->setMaxBehindLines(10);
        // 设置验证码前面最大行数
        $builder->setMaxFrontLines(10);
        // 设置验证码颜色
        $builder->setTextColor(255, 255, 0);
        // 可以设置图片宽高及字体
        $builder->build($width = 150, $height = 40, $font = null);

        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        session()->put('milkcaptcha', $phrase);

        // 生成图片
        header('Cache-Control: no-cache, must-revalidate');
        header('Content-Type:image/jpeg');
        $builder->output();
    }
    public function code3(){
        $validateCode = new ValidateCode();
        $phrase = $validateCode->getCode();
        session()->put('milkcaptcha', $phrase);
        return $validateCode->doimg();
    }
}
