<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MangaRequest extends Model
{
    protected $table = 'manga_requests';

    protected $primaryKey = 'request_id';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'title',
        'mal_link',
        'status'
    ];
}