<?php

namespace App\Modules\Subscription\Entities;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPayment extends Model
{
    protected $fillable = [

        'one_month_payment',
    	'three_month_payment',
    	'six_month_payment',
    	'one_year_payment'
    ];
}
