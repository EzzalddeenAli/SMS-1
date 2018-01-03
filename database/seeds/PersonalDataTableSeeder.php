<?php

use App\PersonalData;
use Illuminate\Database\Seeder;

class PersonalDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonalData::create([
            'gender' => 'male',
            'birthday' => '1998-11-13',
            'birth_place' => 'Batangas',
            'nationality' => 'Filipino',
            'religion' => 'Christian',
            'school_last_attended' => 'North School',
            'level_applied' => 'Grade2',
            'user_id' => 1,
            'user_type' => 'App\Student'
        ]);

        PersonalData::create([
            'gender' => 'male',
            'birthday' => '1997-12-7',
            'birth_place' => 'Sto. tomas',
            'nationality' => 'Filipino',
            'religion' => 'Christian',
            'school_last_attended' => 'West School',
            'level_applied' => 'Grade5',
            'user_id' => 2,
            'user_type' => 'App\Student'
        ]);

        PersonalData::create([
            'gender' => 'female',
            'birthday' => '1999-01-17',
            'birth_place' => 'Batangas',
            'nationality' => 'Filipino',
            'religion' => 'Catholic',
            'school_last_attended' => 'South School',
            'level_applied' => 'Grade3',
            'user_id' => 3,
            'user_type' => 'App\Student'
        ]);
    }
}
