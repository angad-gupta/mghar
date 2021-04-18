<?php

namespace App\Modules\VideoAds\Entities;

use Illuminate\Database\Eloquent\Model;

class VideoAds extends Model
{
	const FILE_PATH = '/uploads/video_ads/';

    protected $fillable = [

    	'vidoe_ads_title',
    	'ads_category',
    	'video_ads_upload',
    	'start_date',
    	'end_date',
    	'status'


	];
	
	public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

}

