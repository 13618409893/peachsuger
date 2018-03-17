<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
class CommonController extends Controller
{
    //图片上传
    public function upload()
    {
        //用file()的方法来读取文件信息
        $file = Input::file('Filedata');
        //isValid()来对图片进行验证,判断该图片是否有效
        if($file->isValid()){
            $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path = $file -> move(base_path().'/uploads',$newName);
            //echo $path;
            $filepath = 'uploads/'.$newName;
            return $filepath;
        }
    }
}
