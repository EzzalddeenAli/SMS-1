<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $level
 * @property int $id
 * @property mixed $students
 * @property mixed $subjects
 */
class Section extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'level_id'
    ];

    public function level()
    {
        return $this->belongsTo('App\Level');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }

}
