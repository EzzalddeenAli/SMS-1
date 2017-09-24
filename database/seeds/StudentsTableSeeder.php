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
            "section_id" => 1,
            "student_id" => 1,
        ]);

        Student::create([
            "username" => "student2",
            "password" => Hash::make("12345678"),
            "first_name" => "Merol",
            "middle_name" => "Vold",
            "last_name" => "Bulsor",
            "age" => 16,
            "section_id" => 1,
            "student_id" => 2,
        ]);

        Student::create([
            "username" => "student3",
            "password" => Hash::make("12345678"),
            "first_name" => "Hanzel",
            "middle_name" => "Gretel",
            "last_name" => "Isad",
            "age" => 18,
            "section_id" => 1,
            "student_id" => 3,
        ]);
    }
}
