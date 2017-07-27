<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalInfo extends Model
{
	protected $fillable = ['user_id', 'username'];
    protected $attributes = ['profile_pic' => '/images/default/profile.jpg'];
}
