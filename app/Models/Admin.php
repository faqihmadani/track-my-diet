<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends User
{
    use HasFactory;

    protected $guard = 'admin';

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
