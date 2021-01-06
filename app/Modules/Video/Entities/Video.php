<?php

namespace App\Modules\Video\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Genre\Entities\Genre;

class Video extends Model
{
	const FILE_PATH = '/uploads/video/';

    protected $fillable = [

    	'genre_id',
        'video_title',
        'video_cover_image',
        'video_embeded_url',
        'description',
        'status',
        'total_views',
        'is_popular',
        'is_trending',
        'is_featured',
        'celebrities'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

    public function genreInfo(){
        return $this->belongsTo(Genre::class,'genre_id');
    }

}
