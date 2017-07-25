<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstagramUser extends Model
{
    protected $attributes = ['access_token' => NULL];
    protected $fillable = ['instagram_id', 'access_token'];
}
