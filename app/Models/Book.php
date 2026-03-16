<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'book_id';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'author',
        'description'
    ];

    // Many-to-many with genres
    public function genres()
    {
        return $this->belongsToMany(
            Genre::class,       // Related model
            'book_genres',      // Pivot table
            'book_id',          // This model foreign key in pivot
            'genre_id'          // Related model foreign key in pivot
        );
    }
}