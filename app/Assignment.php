<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $teacher
 * @property mixed $subject
 */

class Assignment extends Model
{

    protected $fillable = ['title', 'description', 'deadline', 'subject_id', 'teacher_id',];

    protected $hidden = ['created_at', 'updated_at',];

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

}
