<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;
use Cviebrock\EloquentSluggable\Sluggable;

class Event extends Model
{
    use Taggable;
    use Sluggable;
    protected $table= 'events';
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function users()
    {   
        return $this->belongsToMany('App\User','savedevents','event_id','user_id');
    }
}
