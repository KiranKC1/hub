<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function album()
    {
        return $this->belongsTo('App\Album');
    }
}
