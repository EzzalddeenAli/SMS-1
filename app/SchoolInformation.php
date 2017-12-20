<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */
class SchoolInformation extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
}
