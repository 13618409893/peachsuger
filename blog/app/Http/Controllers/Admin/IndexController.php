<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Validator;
use App\Http\Model\User;
class IndexController extends CommonController
{
    public function index()
    {
        return view('admin.index');
    }

    public function info()
    {
        return view('admin.info');
    }

    //修改密码操作
    public function pass()
    {
        //获取值
        if($input=Input::all()){

            $rules = [
                'password' => 'required|between:6,20|confirmed',
            ];

            $message = [
                'password.required' => '新密码不能为空',
                'password.between'=>'新密码必须在6-20位之间！',
                'password.confirmed'=>'新密码和确认密码不一致！',
            ];

            //生成一个验证器,第一个参数是验证的数值，第二个参数为验证规则，第三个参数为提示信息
            $validator = Validator::make($input,$rules,$message);

            //对修改密码进行验证
            if($validator->passes()){
                $user = User::first();
                //对数据库当中的密码字段进行解密操作
                $_password = Crypt::decrypt($user->user_pass);
                //如果输入的原密码和数据库中的密码一致则将进行新密码的加密操作并替换掉原密码
                if($input['password_o']==$_password){
                    $user->user_pass = Crypt::encrypt($input['password']);
                    //替换成功，进行页面的跳转
                    $user->update();
                    return redirect('admin/info');
                }else{
                    //返回错误信息
                    return back()->with('errors','原密码有错误!');
                }
            }else{
                //返回所有的错误信息
                return back()->withErrors($validator);
            }
        }else{
            return view('admin.pass');
        }
    }

}
