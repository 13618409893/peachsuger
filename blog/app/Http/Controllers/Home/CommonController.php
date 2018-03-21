<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Article;
use Illuminate\Support\Facades\View;
class CommonController extends Controller
{
    //自动调用函数来实现公共部分的加载
     public function __construct()
    {
        //点击量最高的6篇文章
        $hot = Article::orderBy('art_view','desc')->take(5)->get();

        //最新发布文章8篇
        $new = Article::orderBy('art_time','desc')->take(8)->get();

        View::share('hot',$hot);
        View::share('new',$new);
    }
}
