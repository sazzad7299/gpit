<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    

    
    public function categories()
    {
        return $this->belongsTo('App\Category','category_id');
       

    }


    public function subcategories()
    {
        return $this->belongsTo('App\Subcategory','subcategory_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
