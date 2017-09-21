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
            'subject_id' => 1,
            'student_id' => 1,
        ]);
    }
}
