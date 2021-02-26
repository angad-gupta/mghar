<?php

namespace App\Modules\Subscriber\Entities;

use Illuminate\Database\Eloquent\Model;

class SubscriberPlan extends Model
{
    protected $fillable = [

    	'subscriber_id',
    	'start_date',
    	'end_date',
    	'plan',
    	'date',
    	'status'

    ];
}
