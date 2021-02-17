<?php

namespace App\Modules\Subscription\Entities;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [

    	'subsription_title',
    	'is_one_month',
    	'one_month_feature',
    	'is_three_month',
    	'three_month_feature',
    	'is_six_month',
    	'six_month_feature',
    	'is_one_year',
    	'one_year_feature'

    ];
}
