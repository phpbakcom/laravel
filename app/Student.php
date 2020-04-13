<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     protected $table='student';  //ָ����
     protected $primaryKey='id';  //ָ������ 
     protected $fillable=['name','age'];//ָ�����������ֶ�
     protected $guarded=[];//ָ�������������ֶ�
     //--�Զ�ά��ʱ��
     public $timestamps =true;
     protected function getDateFormat(){
        return time();
     }   //ָ��create_at , update_at�����ʱ���ʽ
     protected function asDateTime($val){
        return $val;
     } //ָ��create_at , update_at��ѯ��ʱ���ʽ
     //--�Զ�ά��ʱ��
}