<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function categories()
    {
        return $this->belongsTo('App\Category','category_id');
    }

    public function posts()
    {
        return $this->hasMany('App\post');
    }
}
