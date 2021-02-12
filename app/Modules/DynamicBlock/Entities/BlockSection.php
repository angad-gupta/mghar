<?php

namespace App\Modules\DynamicBlock\Entities;

use Illuminate\Database\Eloquent\Model;

class BlockSection extends Model
{
	const FILE_PATH = '/uploads/ads/';

    protected $fillable = [

    	'block_section',
    	'sort_order',
    	'is_scripted_ads',
    	'scripted_ads',
    	'ads_title',
        'ads_url',
    	'ads_image'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }
}
