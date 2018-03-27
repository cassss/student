<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $guarded = [''];
    public function klasss()
    {
        return $this->hasMany('App\Klass');
    }
}
