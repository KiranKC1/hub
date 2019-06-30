<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;
use Cviebrock\EloquentSluggable\Sluggable;

class Opportunity extends Model
{
    use Taggable;
    use Sluggable;
    protected $table= 'opportunities';
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
        return $this->belongsToMany('App\User','savedopportunities','opportunity_id','user_id');
    }
}
