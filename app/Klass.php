<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klass extends Model
{
    protected $guarded = [''];
    //对应课程
    public function sections()
    {
        return $this->hasMany('App\Section');
    }
}
