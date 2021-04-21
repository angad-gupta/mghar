<?php

namespace App\Modules\VideoAds\Entities;

use Illuminate\Database\Eloquent\Model;

class VideoAdsLog extends Model
{
    protected $fillable = [

        'video_ads_id',
    	'video_id',
    	'video_ads_upload',
    	'total_views',

    ];
}

