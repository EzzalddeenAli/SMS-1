<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationalBackground extends Model
{
    public $timestamps = false;
    //    protected $guarded = ['id'];
    protected $fillable = ['level', 'name_of_school', 'year_attended', 'honors_awards', 'user_id', 'user_type'];
}
