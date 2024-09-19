<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
   public function videocategories()
    {
        return $this->belongsTo('App\VideoCategory','pro_category');
    }
}
