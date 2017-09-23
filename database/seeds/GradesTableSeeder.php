<?php

use App\Grade;
use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade::create([
            '1st' => 85,
            '2nd' => 90,
            '3rd' => 89,
            '4th' => 86,
            'subject_id' => 1,
            'student_id' => 1,
        ]);

        Grade::create([
            '1st' => 85,
            '2nd' => 87,
            '3rd' => 86,
            'subject_id' => 1,
            'student_id' => 2,
        ]);

        Grade::create([
            '1st' => 88,
            '2nd' => 84,
            '3rd' => 82,
            'subject_id' => 1,
            'student_id' => 3,
        ]);

        Grade::create([
            '1st' => 82,
            '2nd' => 93,
            '3rd' => 85,
            '4th' => 86,
            'subject_id' => 2,
            'student_id' => 1,
        ]);

        Grade::create([
            '1st' => 82,
            '2nd' => 84,
            '3rd' => 88,
            'subject_id' => 2,
            'student_id' => 2,
        ]);

        Grade::create([
            '1st' => 86,
            '2nd' => 87,
            '3rd' => 85,
            'subject_id' => 2,
            'student_id' => 3,
        ]);
    }
}
