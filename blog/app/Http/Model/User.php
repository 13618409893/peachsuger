<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='users';
    protected $primaryKey='user_id';//主键ID
    public $timestamps=false;//时间创建关闭
}
