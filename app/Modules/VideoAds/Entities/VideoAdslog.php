<?php

namespace App\Modules\VideoAds\Entities;

use Illuminate\Database\Eloquent\Model;

class VideoAdslog extends Model
{
    protected $table = 'video_ads_logs';
    protected $fillable = [

        'video_ads_id',
    	'video_id',
    	'video_ads_upload',
    	'total_views',

    ];
}
