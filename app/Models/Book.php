<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey = 'book_id';

    protected $fillable = [
        'title',
        'author',
        'description',
        'release_date',
        'total_pages',
        'cover_image',
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

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'book_id', 'book_id');
    }
}