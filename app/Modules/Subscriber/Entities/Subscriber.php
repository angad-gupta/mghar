<?php

namespace App\Modules\Subscriber\Entities;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = [

    	'username',
    	'password',
    	'full_name',
    	'email',
    	'mobile_no',
    	'provider_id',
    	'is_external_authenticate',
    	'status',
    	'email_verified',
    	'provider',
    	'user_type',
    	'registered_ip',
    	'remember_token'

    ];
}
