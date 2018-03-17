<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Validator;
require_once '/org/code/Code.class.php';


class LoginController extends CommonController
{
    //登录页面
    public function login()
    {
        //校验验证码
        //将input的值传进来
        if($input = Input::all()){
            $code = new \Code;
            $_code = $code->get();  //获取验证码进行验证
            //如果验证码有误则跳转登录页面
            if(strtoupper($input['code'])!=$_code){
                return back()->with('msg','验证码错误');
            }
            //如果用户名或者是密码有误，则跳转到登录页面
            $user = User::first();
            if($user->user_name != $input['user_name'] || Crypt::decrypt($user->user_pass)!= $input['user_pass']){
                return back()->with('msg','用户名或者密码错误！');
            }

            session(['user'=>$user]);
            //dd(session('user'));
            return redirect('admin/index');

        }else{
             return view('admin.login');
        }

    }

    //做退出操作
    public function quit()
    {
        session(['user'=>null]);
        return redirect('admin/login');
    }


    //验证码
    public function code()
    {
        $code = new \Code;
        $code->make();
    }

    //进行加密的操作，获取在本机添加MAC的方式来进行加密和解密操作
    //如果环境发生变化，MAC地址就会发生变化，这个时候会对数据表中加密的部分产生严重的影响，甚至是全部废掉
    // public function crypt()
    // {
    //     //进行密码加密的处理
    //     $str = '123456';
    //     $str_p="eyJpdiI6IlZ0QWg0MSsyOFRzRGZINXhoQzRJM3c9PSIsInZhbHVlIjoiT1pHanIwak9haUxENVMrMzliSk53Zz09IiwibWFjIjoiYjdjM2M5NDNlNjEyY2JjMjI5MzhjNGVkNTE1Y2QzOWM5MTc1MzljZDdlNjU3YjEzYmU0MjUzODQ0MjRiNzc1OSJ9";

    //     echo Crypt::encrypt($str);
    //     echo "<br/>";
    //     echo Crypt::decrypt($str_p);
    // }
}
