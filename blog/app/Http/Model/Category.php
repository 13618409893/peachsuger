<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

//文章分类模型
class Category extends Model
{
    protected $table='category';
    protected $primaryKey='cate_id';//主键ID
    public $timestamps=false;//时间戳关闭
    protected $guarded=[];//设置不能填充的字段

    //建立分类树
    public function tree()
    {
        $categorys = $this->all();
        return $this->getTree($categorys,'cate_name','cate_id','cate_pid');
    }

    //获取分类排序
    /**
     * [getTree description]
     * @param  [type]  $data       [=$categorys]
     * @param  [type]  $field_name [=$cate_name]
     * @param  string  $field_id   [=$cate_id]
     * @param  string  $field_pid  [=$cate_pid]
     * @param  integer $pid        [=0]
     * @return [type]              [返回数组当中存储的数据]
     */
    //获取分类树
    public function getTree($data,$field_name,$field_id='id',$field_pid='pid',$pid=0)
    {
        $arr = array();
        foreach ($data as $k=>$v){
            if($v->$field_pid==$pid){
                $data[$k]["_".$field_name] = $data[$k][$field_name];
                $arr[] = $data[$k];
                foreach ($data as $m=>$n){
                    if($n->$field_pid == $v->$field_id){
                        //用字符串拼接，使二级分类更加明显
                        $data[$m]["_".$field_name] = '├─ '.$data[$m][$field_name];
                        $arr[] = $data[$m];
                    }
                }
            }
        }
        return $arr;
    }
}
