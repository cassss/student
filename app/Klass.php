<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klass extends Model
{
    //
    public function sections()
    {
        return $this->hasMany('App\Section');
    }
}
