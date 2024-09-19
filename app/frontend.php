<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class frontend extends Model
{
    public function pages()
    {
        return $this->belongsTo('App\Page','page_id');
    }
}
