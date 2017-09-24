<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property mixed $subjects
 */
class Teacher extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'password', 'first_name', 'middle_name','last_name', 'age', 'advisory',
    ];

    protected $hidden = [
        'remember_token', 'created_at', 'updated_at',
    ];

    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }

}
