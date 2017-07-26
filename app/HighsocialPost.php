<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HighsocialPost extends Model
{
    //
    protected $fillable = [
    	'body', 'published_at', 'user_id'
    ];
        public function user()
    {
        return $this->hasOne('App\User');
    }
}
