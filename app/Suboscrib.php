<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suboscrib extends Model
{
    protected $table = 'suboscribs';
    protected $fillable = ['name','email','subject','message'];
}
