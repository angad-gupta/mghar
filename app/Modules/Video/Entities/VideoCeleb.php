<?php

namespace App\Modules\Video\Entities;

use Illuminate\Database\Eloquent\Model;

class VideoCeleb extends Model
{
    protected $fillable = [

    	'video_id',
    	'celebrity_id'

    ];
}
