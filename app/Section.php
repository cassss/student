<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded = [''];
    //获取所属课程
    public function klass()
    {
        return $this->belongsTo('App\Klass');
    }
}
