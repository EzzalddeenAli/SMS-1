<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property mixed $grades
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property mixed $section
 */
class Student extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'password', 'first_name', 'middle_name','last_name', 'age', 'section_id', 'student_id',
    ];

    protected $hidden = [
        'remember_token', 'created_at', 'updated_at',
    ];

    public function grades()
    {
        return $this->hasMany('App\Grade');
    }

    public function section()
    {
        return $this->belongsTo('App\Section');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }

}
