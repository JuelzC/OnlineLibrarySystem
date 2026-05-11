<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    protected $table = 'users';

    protected $primaryKey = 'user_id';

    public $timestamps = false;

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        'role_id',
        'date_of_birth',
        'account_approval'
    ];

    public function bookmarks()
{
    return $this->belongsToMany(
        Book::class,
        'bookmarks',
        'user_id',
        'book_id'
    )
    ->withTimestamps()
    ->select('books.*');
}
    protected $hidden = [
        'password',
        'remember_token',
    ];
}