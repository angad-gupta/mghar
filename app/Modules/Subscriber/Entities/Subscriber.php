<?php

namespace App\Modules\Subscriber\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Modules\Subscriber\Entities\SubscriberWishlist;

class Subscriber extends Authenticatable
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

    public function WishlistInfo()
    {
        return $this->hasMany(SubscriberWishlist::class, 'subscriber_id');
    }
}
