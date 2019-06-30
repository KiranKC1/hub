<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;
use Cviebrock\EloquentSluggable\Sluggable;

class UserPost extends Model
{
    use Taggable;
    use Sluggable;
    protected $table= 'users_dummy_posts';
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $casts = [
        'seen' => 'boolean',
    ];
}
