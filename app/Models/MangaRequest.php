<?php


use Illuminate\Database\Eloquent\Model;

class MangaRequest extends Model
{
    protected $table = 'manga_requests';

    protected $primaryKey = 'request_id';

    public $timestamps = true;

    // Fields allowed to be inserted
    protected $fillable = [
        'user_id',
        'title',
        'mal_link',
        'status'
    ];
}
