<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyBackground extends Model
{
    public $timestamps = false;
//    protected $guarded = ['id'];
    protected $fillable = [
        'mother_name', 'mother_age', 'mother_nationality', 'mother_occupation',
        'mother_contact', 'mother_work_address', 'father_name', 'father_age',
        'father_nationality', 'father_occupation', 'father_contact', 'father_work_address',
        'user_id', 'user_type'
        ];

    public function user()
    {
        return $this->morphTo();
    }
}
