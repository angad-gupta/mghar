<?php

namespace App\Modules\Banner\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Video\Entities\Video;


class Banner extends Model
{
	const FILE_PATH = '/uploads/banner/';

    protected $fillable = [

    	'banner_title',
    	'banner_image',
    	'status',
    	'banner_source',
    	'video_id',
    	'banner_link'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

    public function VideoInfo(){
        return $this->belongsTo(Video::class,'video_id','id');
    }

}
