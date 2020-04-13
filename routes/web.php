<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
//首页
Route::get('/','LinkController@index');
//基础路由
//----http://localhost:8989/public/index.php/basicget
Route::get('basicget',function(){
    return 'basicget';
});   
//----地址栏访问不了 http://localhost:8989/public/index.php/basicpost
Route::post('basicpost',function(){
    return 'basicpost';
});   
//多请求路由
//----http://localhost:8989/public/index.php/basicmatch
Route::match(['get','post'],'basicmatch',function(){
    return 'match';
}); 
//----http://localhost:8989/public/index.php/basicany
Route::any('basicany',function(){
    return 'any';
}); 
//路由参数
//----参数必选 http://localhost:8989/public/index.php/user1/45
Route::get('user1/{id}',function($id){
    return 'user-'.$id;
});
//----参数可选 http://localhost:8989/public/index.php/user2/45
Route::get('user2/{name?}',function($name){
    return 'user-'.$name;
});
//----参数可选,并且有默认值 http://localhost:8989/public/index.php/user3/45
Route::get('user3/{name?}',function($name='php'){
    return 'user-'.$name;
});

//----参数可选,并且有默认值,加正则 http://localhost:8989/public/index.php/user4/45
Route::get('user4/{name?}',function($name='php'){
    return 'user-'.$name;
})->where('name','[A-Za-z]+');
//----参数可选,并且有默认值,加正则,多个参数 http://localhost:8989/public/index.php/user5/45/sss
Route::get('user5/{id}/{name?}',function($id,$name='php'){
    return 'user-'.$id.'-'.$name;
})->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']);
 
//路由别名
//----http://localhost:8989/public/index.php/user/center
Route::get('user/center',['as'=>'center',function(){
    return route('center');  
}]);

//路由群组
//----http://localhost:8989/public/index.php/member/basicget
//----http://localhost:8989/public/index.php/member/basicany
Route::group(['prefix'=>'member'],function(){
    Route::get('basicget',function(){
    return 'member/basicget';
    });
    Route::any('basicany',function(){
    return 'member/basicany';
    }); 
});
//路由中输出视图
//----http://localhost:8989/public/index.php/view
Route::get('view', function () {
    return view('welcome');
});
Route::any('/index/info','IndexController@info');
Route::any('/index/index','IndexController@index');
Route::any('/index/index2',['uses'=>'IndexController@index2']);
//参数绑定
Route::any('/index/index3/{id}',['uses'=>'IndexController@index3'])->where('id','[0-9]+');
//Route::any('/index/index',['uses'=>'IndexController@index']);
//别名
//Route::any('/index/index',['uses'=>'IndexController@index','as'=>'index']);
Route::get('index1',function () {
    return '123'.route('index/index');
});
Route::get('stuent/index','StudentController@index');
Route::get('student/query','StudentController@query');
Route::get('student/queryorm','StudentController@queryorm');
Route::any('cache','StudentController@cache');
Route::group(['middleware'=>['web']],function(){
    Route::any('session','StudentController@session');
    Route::any('session2','StudentController@session2');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('student/request','StudentController@request');
//队列
Route::get('queue','QueueController@queue');

Route::get('codes/index','CodesController@index'); //显示验证码
Route::get('codes/code','CodesController@code'); //生成验证码
Route::post('codes/checkcode','CodesController@checkcode');//检查验证码
Route::get('codes/code2','CodesController@code2'); //生成验证码
Route::get('codes/code3','CodesController@code3'); //生成验证码

Route::get('mail','MailController@index');

Route::get('upload','UploadContoller@index');
Route::post('upload/cos','UploadContoller@cos');
