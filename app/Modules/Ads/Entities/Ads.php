<?php

namespace App\Modules\Ads\Entities;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
	const FILE_PATH = '/uploads/ads/';

    protected $fillable = [

		'ads_title',
		'ads_category',
		'ads_url',
		'ads_image',
		'status'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

}
