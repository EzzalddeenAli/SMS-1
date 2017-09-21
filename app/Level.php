<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property mixed $section
 */
class Level extends Model
{
    public $timestamps = false;

    public function section()
    {
        return $this->hasMany('App\Section');
    }
}
