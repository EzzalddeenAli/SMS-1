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
 * @property string $full_name
 * @property mixed $first_name
 * @property mixed $middle_name
 * @property mixed $last_name
 */
class Student extends Authenticatable
{
    use Notifiable;

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'username', 'password', 'first_name', 'middle_name','last_name', 'age', 'section_id', 'student_id',
    ];

    protected $hidden = [
        'remember_token', 'created_at', 'updated_at',
    ];

    /*GETTERS*/
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getMiddleNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }
    /*END OF GETTERS*/

    /*SETTERS*/
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = strtolower($value);
    }

    public function setMiddleNameAttribute($value)
    {
        $this->attributes['middle_name'] = strtolower($value);
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = strtolower($value);
    }
    /*END OF SETTERS*/

    public function grades()
    {
        return $this->hasMany('App\Grade');
    }

    public function section()
    {
        return $this->belongsTo('App\Section');
    }

}
