<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use Sluggable;
    protected $table = "users";
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    protected $fillable = [
        'email','name','slug','password','provider','provider_id','is_verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token',
    ];
  
    public function posts()
    {   
        return $this->belongsToMany('App\Post','savedarticles','user_id','article_id');
    }

    public function likes()
    {
        return $this->belongsToMany('App\Post','likes','user_id','article_id');
    }

    public function opportunities()
    {
        return $this->belongsToMany('App\Opportunity','savedopportunities','user_id','opportunity_id');
    }
    public function events()
    {
        return $this->belongsToMany('App\Event','savedevents','user_id','event_id');
    }
}
