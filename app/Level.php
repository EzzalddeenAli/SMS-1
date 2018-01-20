<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property mixed $section
 * @property mixed $sections
 */
class Level extends Model
{
    public $timestamps = false;

    /* SETTERS */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
    /*  END SETTERS */
    
    public function sections()
    {
        return $this->hasMany('App\Section');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
