<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}
