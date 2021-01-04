<?php

namespace App\Modules\Dropdown\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Dropdown\Entities\Field;

class dropdown extends Model
{
    protected $fillable = [
        
        'fid',
        'dropvalue',
    ];
    
     public function dropdownField(){
        return $this->belongsTo(Field::class,'fid');
    }
}
