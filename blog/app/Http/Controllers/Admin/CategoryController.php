<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;
use Validator;
class CategoryController extends CommonController
{
    //get  admin/index
    public function index()
    {
        //实例化一个对象，并且调用model类当中的方法
        $categorys = (new Category)->tree();
        //在model类当中获取数据并且将数据返回给视图
        return view('admin.category.index')->with('data',$categorys);
    }

    //get  admin/category/create  添加分类
    public function create()
    {
        //读取分类标题
        $data = Category::where('cate_pid',0)->get();
        //用compact()方法将数据传输到视图当中
        return view('admin/category/add',compact('data'));
    }

    //post  admin/category      添加分类提交的方法
     public function store()
    {
        //排除_token的验证
        $input = Input::except('_token');

        $rules = [
            'cate_name' => 'required',
        ];

        $message = [
            'cate_name.required' => '分类名称不能为空',
        ];
        $validator = Validator::make($input,$rules,$message);

        //对提交的数据进行验证入库
        if($validator->passes()){
            $re = Category::create($input);
            if($re){
                return redirect('admin/category');
            }else{
                return back()->with('errors','数据提交失败！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //get  admin/category/{category}
    public function show()
    {

    }

    //delete  admin/category/{category}  //删除分类操作
    public function destroy($cate_id)
    {
        $re = Category::where('cate_id',$cate_id)->delete();
        //如果删除父级分类，则将所有的子分类转变成父级分类
        Category::where('cate_pid',$cate_id)->update(['cate_pid'=>0]);
        if($re){
            $data = [
                'status' => 0,
                'msg' => '分类删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '分类删除失败，请稍后重试！',
            ];
        }
        return $data;
    }

    //get  admin/category/{category}/edit  //编辑分类
     public function edit($cate_id)//设置参数，接收视图传过来的值
    {
        $field = Category::find($cate_id);
        $data = Category::where('cate_pid',0)->get();
        return view('admin.category.edit',compact('field','data'));
    }


    //put  admin/category/{category}   //更新分类
    public function update($cate_id)
    {
        //过滤这两个方法
        $input = Input::except('_token','_method');
        $re = Category::where('cate_id',$cate_id)->update($input);
        if($re){
            return redirect('admin/category');
        }else{
            return back()->with('errors','更新失败！');
        }

    }



}
