<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     protected $table='student';  //指定表
     protected $primaryKey='id';  //指定主键 
     protected $fillable=['name','age'];//指定允许批量字段
     protected $guarded=[];//指定不允许批量字段
     //--自动维护时间
     public $timestamps =true;
     protected function getDateFormat(){
        return time();
     }   //指定create_at , update_at插入的时间格式
     protected function asDateTime($val){
        return $val;
     } //指定create_at , update_at查询的时间格式
     //--自动维护时间
}