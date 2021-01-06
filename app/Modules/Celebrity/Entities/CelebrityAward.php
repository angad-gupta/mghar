<?php

namespace App\Modules\Celebrity\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Celebrity\Entities\Celebrity;

class CelebrityAward extends Model
{
	const FILE_PATH = '/uploads/Celebrity/award/';

    protected $fillable = [

    	'celebrity_id',
        'title',
        'description',
        'image'
        
    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }
    
    public function celebrityInfo(){
        return $this->belongsTo(Celebrity::class,'celebrity_id');
    }
  
}
