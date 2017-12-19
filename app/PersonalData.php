<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'personal_data';

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
