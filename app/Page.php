<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function frontend()
    {
        return $this->hasMany('App\frontend');
    }
}
