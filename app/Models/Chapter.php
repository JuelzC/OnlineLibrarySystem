<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Page;

class Chapter extends Model
{
    protected $primaryKey = 'chapter_id';

    protected $fillable = [
        'book_id',
        'chapter_number',
        'chapter_title',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'book_id');
    }

    public function pages()
    {
        return $this->hasMany(Page::class, 'chapter_id', 'chapter_id')
                    ->orderBy('page_number');
    }
}