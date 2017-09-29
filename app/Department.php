<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 */
class Department extends Model
{
    public $timestamps = false;

    public function levels()
    {
        return $this->hasMany('App\Level');
    }
}
