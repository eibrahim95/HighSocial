<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwitterUser extends Model
{
    protected $attributes = ['access_token' => NULL, 'access_token_secret' => NULL];
    protected $fillable = ['twitter_id', 'access_token', 'access_token_secret'];
}
