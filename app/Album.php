<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public function album_images()
    {
        return $this->hasMany('App\Gallery');
    }
}
