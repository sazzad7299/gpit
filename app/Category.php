<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    public function subcategories()
    {
        return $this->hasMany('App\Subcategory');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
    public function posts()
    {
        return $this->hasMany('App\post');
    }
}
