<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property mixed $teacher
 * @property mixed $student
 * @property mixed $level
 * @property mixed $grade
 * @property mixed $section
 */
class Subject extends Model
{
    public $timestamps = false;

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function level()
    {
        return $this->belongsTo('App\Level');
    }

    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }

    public function section()
    {
        return $this->belongsTo('App\Section');
    }
}
