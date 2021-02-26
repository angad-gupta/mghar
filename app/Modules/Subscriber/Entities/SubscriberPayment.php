<?php

namespace App\Modules\Subscriber\Entities;

use Illuminate\Database\Eloquent\Model;

class SubscriberPayment extends Model
{
    protected $fillable = [

    	'subscriber_id',
    	'plan',
    	'payment_date',
    	'start_date',
    	'end_date',
    	'payment_method',
    	'total_amount',
    	'type',
    	'status',

    ];
}
