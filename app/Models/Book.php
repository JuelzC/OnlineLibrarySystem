<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $primaryKey = 'book_id';

    protected $fillable = [
        'title',
        'author',
        'release_date',
        'total_pages'
    ];

    public function genres()
    {
        return $this->belongsToMany(
            Genre::class,
            'book_genres',
            'book_id',
            'genre_id'
        );
    }

}