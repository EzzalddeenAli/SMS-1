<?php

use App\Student;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            "username" => "student1",
            "password" => Hash::make("12345678"),
            "first_name" => "Lorem",
            "middle_name" => "Ipsum",
            "last_name" => "Enet",
            "age" => 15,
            "class" => 1,
        ]);
    }
}
