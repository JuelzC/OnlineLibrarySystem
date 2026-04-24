<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MangaPages extends Model
{
    protected $table = 'pages';

    protected $fillable = [
        'book_id',
        'page_number',
        'image',
    ];
}
