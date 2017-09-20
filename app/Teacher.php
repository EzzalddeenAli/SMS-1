<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'password', 'first_name', 'middle_name','last_name', 'age', 'advisory',
    ];

    protected $hidden = [
        'remember_token', 'created_at', 'updated_at',
    ];
}
