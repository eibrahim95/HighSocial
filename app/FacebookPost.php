<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacebookPost extends Model
{
    protected $fillable = [
    	'user_id', 'post_id'
    ];
        public function user()
    {
        return $this->hasOne('App\User');
    }
}
