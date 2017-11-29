<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\Rateable;

/**
 * @property mixed $subjects
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property string $full_name
 */
class Teacher extends Authenticatable
{
    use Notifiable, Rateable;

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

    public function advisory_name($id)
    {
        $section = Section::where('level_id', $id)->first();

        return isset($section->name) ? $section->name : $id;
    }

    public function Rated($student_id, $subject_id)
    {
        $rating = Rating::where('student_id', $student_id)->where('subject_id', $subject_id)->first();
        if ($rating === null) {
            return 0;
        }
        return $rating->rating;
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }

}
