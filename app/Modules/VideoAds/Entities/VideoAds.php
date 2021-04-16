<?php

namespace App\Modules\VideoAds\Entities;

use Illuminate\Database\Eloquent\Model;

class VideoAds extends Model
{
    protected $fillable = [

    	'vidoe_ads_title',
    	'ads_category',
    	'video_ads_upload',
    	'start_date',
    	'end_date',
    	'status'


    ];
}

