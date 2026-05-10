<?php

namespace App\Models;

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

    protected $hidden = [
        'password',
        'remember_token',
    ];
}