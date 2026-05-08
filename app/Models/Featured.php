<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Featured extends Model
{
    protected $table ='books';

    protected $fillable = [
        'title',
        'author',
        'description',
        'cover_image',
    ];

}
