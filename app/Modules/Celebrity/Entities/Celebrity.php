<?php

namespace App\Modules\Celebrity\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Genre\Entities\Genre;
use App\Modules\Celebrity\Entities\CelebrityAward;

class Celebrity extends Model
{
	const FILE_PATH = '/uploads/Celebrity/';

    protected $fillable = [

    	'first_name',
        'last_name',
        'celeb_pic',
        'dob',
        'place_of_birth',
        'age',
        'nationality',
        'religion',
        'occupation',
        'genre_id',
        'weight',
        'height',
        'gender',
        'martial_status'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

    public function genreInfo(){
        return $this->belongsTo(Genre::class,'genre_id');
    }

    public function CelebAwardInfo()
    {
        return $this->hasMany(CelebrityAward::class, 'celebrity_id');
    }

}
