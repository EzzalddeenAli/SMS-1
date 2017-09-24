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

    public function sections()
    {
        return $this->hasMany('App\Section');
    }
}
