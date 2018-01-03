<?php

use App\FamilyBackground;
use Illuminate\Database\Seeder;

class FamilyBackgroundTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FamilyBackground::create([
            'mother_name' => 'Lorem Ipsum',
            'mother_age' => 29,
            'mother_nationality' => 'Filipino',
            'mother_occupation' => 'Engineer',
            'mother_contact' => 178373573,
            'mother_work_address' => 'Lipsotech',
            'father_name' => 'Barrack Ipsum',
            'father_age' => 30,
            'father_nationality' => 'Filipino',
            'father_occupation' => 'Neurotech',
            'father_contact' => 178373571,
            'father_work_address' => 'Sto. Rosa Lipsum',
            'user_id' => 1,
            'user_type' => 'App\Student'
        ]);

        FamilyBackground::create([
            'mother_name' => 'Vestibulum eget',
            'mother_age' => 42,
            'mother_nationality' => 'Filipino',
            'mother_occupation' => 'Engineer',
            'mother_contact' => 178345673,
            'mother_work_address' => 'Vivamus ',
            'father_name' => 'eget justo',
            'father_age' => 50,
            'father_nationality' => 'Filipino',
            'father_occupation' => 'dictum',
            'father_contact' => 178372371,
            'father_work_address' => 'Sto. Rosa Integer',
            'user_id' => 2,
            'user_type' => 'App\Student'
        ]);

        FamilyBackground::create([
            'mother_name' => 'Nulla aliquet',
            'mother_age' => 56,
            'mother_nationality' => 'Filipino',
            'mother_occupation' => 'Engineer',
            'mother_contact' => 178123573,
            'mother_work_address' => 'Lipsotech',
            'father_name' => 'felis vestibulum',
            'father_age' => 45,
            'father_nationality' => 'Filipino',
            'father_occupation' => 'tristique',
            'father_contact' => 123373571,
            'father_work_address' => 'Sto. Rosa Curabitur',
            'user_id' => 3,
            'user_type' => 'App\Student'
        ]);
    }
}
