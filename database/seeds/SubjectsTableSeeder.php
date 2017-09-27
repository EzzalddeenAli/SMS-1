<?php

use App\Subject;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
            'name' => 'Computer',
//            'grade_id' => 1,
            'section_id' => 1,
            'teacher_id' => 1,
        ]);

        Subject::create([
            'name' => 'English',
//            'grade_id' => 1,
            'section_id' => 1,
            'teacher_id' => 1,
        ]);
    }
}
