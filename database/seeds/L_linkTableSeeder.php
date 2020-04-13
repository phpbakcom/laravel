<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class L_linkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('l_link')->insert([
            ['name'=>'百度一下','url'=>'http://www.baidu.com','create_at'=>time(),'update_at'=>time()],
            ['name'=>'github--laravel','url'=>'https://github.com/laravel','create_at'=>time(),'update_at'=>time()],
            ['name'=>'腾讯网','url'=>'http://www.qq.com','create_at'=>time(),'update_at'=>time()],
            ['name'=>'php开发工具','url'=>'https://www.php.cn/xiazai/gongju','create_at'=>time(),'update_at'=>time()],
            ['name'=>'Laravel5.5文档','create_at'=>time(),'update_at'=>time(),            
            'url'=>'https://learnku.com/docs/laravel/5.5/installation/1282'],
            ['name'=>'Laravel速查表','create_at'=>time(),'update_at'=>time(),            
            'url'=>'https://www.php.cn/phpkj/laravel/cheatsheet51.html'],
            ['name'=>'Laravel5.8文档','create_at'=>time(),'update_at'=>time(),            
            'url'=>'https://www.php.cn/course/1061.html'],
            ['name'=>'php开发工具','create_at'=>time(),'update_at'=>time(),            
            'url'=>'https://www.php.cn/xiazai/gongju'],
            ['name'=>'PHP中文手册',
            'create_at'=>time(),
            'update_at'=>time(),            
            'url'=>'https://php.golaravel.com/'],
            ['name'=>'laravel中文网',
            'create_at'=>time(),
            'update_at'=>time(),            
            'url'=>'https://www.golaravel.com/'],
            ['name'=>'检测网站安全等级',
            'create_at'=>time(),
            'update_at'=>time(),            
            'url'=>'https://www.ssllabs.com/ssltest/analyze.html'],
            ['name'=>'nginx安全配置试例',
            'create_at'=>time(),
            'update_at'=>time(),            
            'url'=>'https://github.com/h5bp/server-configs-nginx'],
            ['name'=>'本地--laravel例子',
            'create_at'=>time(),
            'update_at'=>time(),
            'url'=>'http://localhost:8989/public/'],            
            ['name'=>'本地--组卷接口',
            'create_at'=>time(),
            'update_at'=>time(),
            'url'=>'http://localhost:10002/'],
            ['name'=>'本地--组卷慧学展现',
            'create_at'=>time(),
            'update_at'=>time(),
            'url'=>'http://localhost:10003/'],
            ['name'=>'本地--VUE例子',
            'create_at'=>time(),
            'update_at'=>time(),
            'url'=>'http://localhost:10006/'],
            ['name'=>'线上测试--组卷展现',
            'create_at'=>time(),
            'update_at'=>time(),
            'url'=>'http://znjc-fore.t.huijiaoyun.com/'],
            ['name'=>'线上正式--组卷展现',
            'create_at'=>time(),
            'update_at'=>time(),
            'url'=>'http://znjc-tiku-fore.tx.huijiaoyun.com/'],
            ['name'=>'线上正式--慧学入口',
            'create_at'=>time(),
            'update_at'=>time(),
            'url'=>'http://normal-web.huijiaoyun.com/'],
            ['name'=>'线上测试--慧学入口',
            'create_at'=>time(),
            'update_at'=>time(),
            'url'=>'http://normal-web.t.huijiaoyun.com/'],
            ['name'=>'packagist',
            'create_at'=>time(),
            'update_at'=>time(),
            'url'=>'https://packagist.org/'], 
  
            
        ]);
    }
}
