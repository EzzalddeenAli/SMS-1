<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    public $timestamps = false;
//    protected $guarded = ['id'];
    protected $fillable = [
        'gender', 'birthday', 'birth_place', 'nationality', 'religion', 'school_last_attended', 'level_applied', 'user_id', 'user_type',
        ];
    protected $table = 'personal_data';

    public function user()
    {
        return $this->morphTo();
    }
}
