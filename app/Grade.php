<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class Grade extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'student_id', 'subject_id'
    ];

    public function subject()
    {
        $this->belongsTo('App\Subject');
    }

    public function scopeGradeOf($query, $subject_id, $student_id)
    {
        return $query->where('subject_id', $subject_id)->where('student_id', $student_id->id)->first();
    }

}
