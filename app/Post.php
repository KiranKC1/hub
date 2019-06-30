<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Taggable;
    use Sluggable;
    protected $table= 'posts';
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
        return $this->belongsToMany('App\User','savedarticles','article_id','user_id');
    }

    public function categories()
    {   
        return $this->belongsToMany('App\Category');
    }

    public function likeusers()
    {
        return $this->belongsToMany('App\User','likes','article_id','user_id');    
    }

}
