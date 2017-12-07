<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 */

class Event extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'date', 'background_color', 'border_color',];

}
