<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'facebook_id', 'twitter_id', 'instagram_id'
    ];
    protected $attributes = ['facebook_id' => NULL , 'twitter_id' => NULL, 'instagram_id' => NULL];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function highsocialPosts()
    {
        return $this->hasMany('App\HighsocialPost');
    }
    public function facebookPosts()
    {
        return $this->hasMany('App\FacebookPost');
    }
}
