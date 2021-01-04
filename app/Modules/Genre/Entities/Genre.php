<?php

namespace App\Modules\Genre\Entities;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [

    	'genre_title',
    	'status'

    ];
}
