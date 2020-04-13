<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Log;

class UploadContoller extends Controller
{
    //
    public function index(){
        Log::info('this is log');
        return view('upload.cos');
    }
    public function cos(Request $request){
        
        

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $ext          = $file->getClientOriginalExtension();
        //  $type         = $file->getClientMineType();
        $realPath     = $file->getRealpath();
        $file_name    = date('Y-m-d-H-i-s').uniqid().'.'.$ext;
        $fileContents = file_get_contents($realPath);
        $disk = Storage::disk('qiniu');
        $bool = $disk->put($file_name, $fileContents);
        //var_dump($bool);
        if($bool){
            return config('filesystems.disks.qiniu.domain').'/'.$file_name;  //不要使用env('QINIU_DOMAIN')
        }
        else{
            return '上传失败';
        }
        exit();

        /*
        //腾讯COS
            $file = $request->file('file');    
        $originalName = $file->getClientOriginalName();
        $ext          = $file->getClientOriginalExtension();
              //  $type         = $file->getClientMineType();
        $realPath     = $file->getRealpath();
        $fileName    = date('Y-m-d-H-i-s').uniqid().'.'.$ext;      
        
        $cosClient = new \Qcloud\Cos\Client(array('region' => env('REGION'),
                'credentials'=> array(
                    'appId' => env('COSV5_APP_ID'),
                    'secretId'    => env('COSV5_SECRET_ID'),
                    'secretKey' => env('COSV5_SECRET_KEY')
                    )
                    )
                    );
           
                $result = $cosClient->putObject(array(
                   // 'Bucket' => env('COSV5_BUCKET'),
                  'Bucket' => 'whty-ypt-public-source-1256736654',
                    'Key' =>  $fileName,
                    'Body' => fopen($realPath, 'rb'),
                    'ServerSideEncryption' => 'AES256'
                    )
                    );
                    var_dump($result);
           
        exit();
        
        //以下是调用本地
        if($request->isMethod('post')){
            $file = $request->file('file');
            if($file->isValid()){
                $originalName = $file->getClientOriginalName();
                $ext          = $file->getClientOriginalExtension();
              //  $type         = $file->getClientMineType();
                $realPath     = $file->getRealpath();
                $file_name    = date('Y-m-d-H-i-s').uniqid().'.'.$ext;
                $bool = Storage::disk('uploads')->put($file_name,file_get_contents($realPath));
                var_dump($bool);
                echo $file_name;
            }
        }
        
        exit();
        */
        
        
        //以下是调用腾讯COS
        echo '<pre>';        
        //对文件进行判断
        $file = $request->file('file');
        //var_dump($file);
        if(empty($file))
        {
            return json_encode(['msg'=>'文件不能为空','status'=>0]);
        }
        //上传文件
        $disk = Storage::disk('cosv5');
        $file_content = $disk -> put('test',$file);
        //第一个参数是你储存桶里想要放置文件的路径，第二个参数是文件对象
        $file_url = $disk->url($file_content);//获取到文件的线上地址
        var_dump($file_url);
        echo '</pre>';
        return json_encode(['msg'=>'上传成功','status'=>1,'data'=>['file_url' => $file_url]]);//返回参数
        
    }
}
