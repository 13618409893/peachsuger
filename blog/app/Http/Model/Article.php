<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

//文章模型
class Article extends Model
{
    protected $table='article';
    protected $primaryKey='art_id';//主键ID
    public $timestamps=false;//时间戳关闭
    protected $guarded=[];//设置不能填充的字段
}
