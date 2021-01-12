<?php

namespace App\Modules\KhelauJuhari\Entities;

use Illuminate\Database\Eloquent\Model;

class KhelauJuhari extends Model
{
	const FILE_PATH = '/uploads/khelau_juhari/';

    protected $fillable = [

        'kj_title',
        'kj_cover_image',
        'kj_embeded_url',
        'description',
        'status',
        'total_views'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

}
