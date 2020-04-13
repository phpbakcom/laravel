<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use App\Student;
use App\Jobs\SendEmail;

class StudentController extends Controller
{

    //
    public function index(){

        //添加
        $bool = DB::insert('insert into student(name,age) values(?,?)',['php','19']);
        var_dump($bool);
        //查询
        $student = DB::select('select * from student');
        echo '<pre>';
        var_dump($student);
        dd($student);
        //更新
        $num = DB::update('update student set age=? where name=?',[20,'php']);
        var_dump($num);

        //删除
        $num = DB::delete('delete from student where id>?',[3]);
        var_dump($num);

        echo '</pre>';
        return 'PHP';
    }
    public function query(){
        //新增

        $num = DB::table('student')->insert(
            ['name'=>'php18','age'=>18]
        );
        dd($num);
        $num = DB::table('student')->insertGetId(
            ['name'=>'php18','age'=>18]
        );
        dd($num);

        $num = DB::table('student')->insert([
                ['name'=>'php18','age'=>18],
                ['name'=>'php19','age'=>19]
            ]

        );
        dd($num);

        //修改
        $num = DB::table('student')->where('id',1)->update(['age'=>30]);
        dd($num);
        //age的值自增1
        $num = DB::table('student')->increment('age');
        dd($num);
        //age的值自增3
        $num = DB::table('student')->increment('age',3);
        dd($num);
        //age的值自减1
        $num = DB::table('student')->decrement('age');
        dd($num);
        //age的值自减3
        $num = DB::table('student')->decrement('age',3);
        dd($num);
        //带条件age的值自减3
        $num = DB::table('student')->where('id',3)->decrement('age',3);
        dd($num);
        //带条件age的值自减3,同时修改其它
        $num = DB::table('student')->where('id',3)->decrement('age',3,['name'=>'php100']);
        dd($num);

        //删除

        DB::table('student')->delete();
        $num = DB::table('student')->where('id',3)->delete();
        $num = DB::table('student')->where('id','>=',3)->delete();

        //查询
        $res=DB::table('student')->get(); //获取表中全部数据
        dd($res);
        $res=DB::table('student')->orderBy('id','desc')->first(); //获取表中第一条数据
        dd($res);
        $res=DB::table('student')->where('id',2)->get();
        $res=DB::table('student')->where('id','>=',2)->get();
        $res=DB::table('student')->whereRaw('id>=? and age>?',[3,19])->get();

        $name = DB::table('student')->pluck('name');

        $name = DB::table('student')->lists('name');
        $name = DB::table('student')->lists('name','id');

        $name = DB::table('student')->select('name','id','age')->get();

        $name = DB::table('student')->chunk(2,function($st){
            var_dump($st);  //return $st;
        });

        //聚合函数

        $name = DB::table('student')->count();
        $name = DB::table('student')->max('age');
        $name = DB::table('student')->min('age');
        $name = DB::table('student')->avg('age');
        $name = DB::table('student')->sum('age');

    }
    public function queryorm(){
        /*
        $res=Student::all();
        dd($res);
        $student = Student::find(1);
        $student = Student::findOrFail(1);
        
        //使用查询构造器
        $student = Student::get();
        
        $student = Student::where('id','>=',1)->orderBy('age','desc')->first();
        dd($student);
        Student::chunk(2,function($st){
            var_dump($st);
        });
        //使用查询构造器 聚合函数
        $num = Student::count();
        $max = Student::where('id','>=',1)->max('age');        
        dd($num);
        
        
        //使用模量新增数据   --自动更新create_at , update_at
        $st = new Student();
        $st->name = 'php2020';
        $st->age = 20;
        $res = $st->save();
        
        $students = Student::find(18);
        echo date('Y-m-d H:i:s',$students->created_at);
        
        //使用批量新增数据，必须指定批量字段
        Student::create(
        ['name'=>'123','age'=>20]
        );
        //以属性查找，如果没有就新增，并取得新的实例
         Student::firstOrCreate(
        ['name'=>'333','age'=>3]
        );
        //以属性查找，如果没有，就返回新实全，需要保存，自己调save
         $st =Student::firstOrNew(
            ['name'=>'333','age'=>6]
        );
        $st->save();
        */

        //更新数据
        //通过模型更新数据
        $st = Student::find(17);
        echo '<pre>';
        var_dump($st);
        echo '</pre>';
        exit();
        $st->name = 'pohp';
        $bool = $st->save();
        var_dump($bool);

        //通过查询构造器更新        
        //$num = Student::where('id','>',1)->update(['age'=>41]);

        /*
        //删除数据        
        //通过模型删除
        $st = Student::find(1);
        $bool = $st->delete();
        var_dump($bool);
        //通过主键值删除
        $num = Student::destroy(18);
        $num = Student::destroy(18,19);
        $num = Student::destroy([18,19]);
        //根据指定条件删除
        $num = Student::where('id','>',180)->delete();
        */
    }
    public function cache(){
        Cache::put('key1','val2020',10); //put写入缓存 ,例如：Cache::put('键'，‘值’，‘缓存时间，单位分钟’);
        $var = Cache::get('key1');
        var_dump($var);
        /*
        $bool = Cache::add('key2','val1',10);//add写入缓存，KEY存在，写入失败。KEY不存在，写入成功.返回一直BOOL
        var_dump($bool);
        $var = Cache::pull('key2');//pull读取缓存，并将缓存删除
        var_dump($var);
        Cache::forever('key3','val1');//forever写入缓存 一直在
        $var = Cache::get('key3');
        var_dump($var);
        $bool = Cache::has('key1');//has查缓存在不在
        var_dump($bool);
        Cache::get('key1');//get读取缓存
        
        Cache::forget('key1');//forget 删除缓存
        $bool = Cache::has('key1');//has查缓存在不在
        var_dump($bool);
        */

        return 'cache';
    }
    public function session(Request $r){


        $r->session()->put('key','vale1');
        echo $r->session()->get('key');

        session()->put('key','vale2');
        echo session()->get('key');

        Session::put('key','vale3');
        echo Session::get('key');


        echo Session::get('key2','default'); //不存在，显示默认值


        Session::put(['key'=>'vale3']);  //以数组的形式存储数据

        //把数据放session数组中
        Session::push('key5','123');
        Session::push('key5','456');

        $var= Session::get('key5','default'); //不存在，显示默认值
        dd($var);

        //取出数据并删除
        $var= Session::pull('key5','default');
        dd($var);

        //取出全部的session
        $var=Session::all();
        dd($var);

        Session::has('key5');  //看在不在

        session::forget('key5'); //删除指定的session

        session::flush();//清空全部的session

        Session::flash('key2','vals'); //暂存数据,访问第一次有，第2次没有了
        $var= Session::get('key2','default'); //不存在，显示默认值
        dd($var);


        Session::put('key3',json_encode($_SERVER));

    }
    public function session2(){



        $s = Session::get('key3');
        var_dump($s);
    }
    public function request(Request $quest){
        $name = $quest->input('name');
        var_dump($name);
        $name = $quest->input('name','php2020');//如果没有，赋默认值
        var_dump($name);
        $bool = $quest->has('name')  ;    //看存不存在
        var_dump($bool);
        if($bool){
            echo $quest->input('name');
        }else{
            echo 'nothing';
        }
        $res = $quest->all(); //全部的参数
        dd($res);
        $bool = $quest->isMethod('POST');
        var_dump($bool);

        $bool = $quest->ajax();
        var_dump($bool);
        $bool = $quest->is('student/*');  //看URL合不合规则
        var_dump($bool);
        $res=  $quest->url();
        var_dump($res);

        echo $quest->server('PATH_INFO');
        echo $quest->method();
    }
    public function respose(){
        //响应json
        $data =[
            'g'=>'aaa',
            'u'=>'bbb',
        ];

        return respose()->json();

        //重定向
        return redirect('session2');
        //session的flash数据。只有取一次  使用session::get('msg')取出来
        return redirect('session2')->with('msg','flash数据');

        //action
        return redirect()->action('ss@session2');
        //session的flash数据。只有取一次  使用session::get('msg')取出来
        return redirect()->action('ss@session2')->with('msg','flash数据');

        //route
        return redirect()->route('session2');
        //session的flash数据。只有取一次  使用session::get('msg')取出来
        return redirect()->route('session2')->with('msg','flash数据');

        //back
        return redirect()->back();

    }
}
