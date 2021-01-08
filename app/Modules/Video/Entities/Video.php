<?php

namespace App\Modules\Video\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Genre\Entities\Genre;
use App\Modules\Celebrity\Entities\Celebrity;
use App\Modules\Video\Entities\VideoCeleb;

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
        'is_featured'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

    public function genre(){
        return $this->belongsTo(Genre::class,'genre_id','id');
    }

    public function Celebrity(){
        return $this->belongsTo(Celebrity::class,'celebrities','id');
    }

    public function CelebVideo()
    {
        return $this->hasMany(VideoCeleb::class, 'video_id');
    }

    static function findByVidId($vid_id){
        return Video::find($vid_id);
    }


}
