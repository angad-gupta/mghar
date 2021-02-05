<?php

namespace App\Modules\Subscriber\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Video\Entities\Video;


class SubscriberWishlist extends Model
{
    protected $fillable = [

    	'video_id',
    	'subscriber_id'

    ];

    public function videoInfo(){
        return $this->belongsTo(Video::class,'video_id');
    }

}
