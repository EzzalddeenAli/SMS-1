<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class School_information extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
}
