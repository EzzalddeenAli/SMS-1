<?php

use App\Student;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{

    public function run()
    {
        /* INCLUDES EDUCATIONAL BACKGROUND SEEDER */
        $levels = ['nursery', 'kinder', 'preparatory'];
        for ($i = 1; $i < 13; $i++ ) {
            array_push($levels, "grade$i");
        }

        $student1 = Student::create([
            "username" => "student1",
            "password" => Hash::make("12345678"),
            "first_name" => "Lorem",
            "middle_name" => "Ipsum",
            "last_name" => "Enet",
            "age" => 15,
            "section_id" => 1,
        ]);

        $student2 = Student::create([
            "username" => "student2",
            "password" => Hash::make("12345678"),
            "first_name" => "Merol",
            "middle_name" => "Vold",
            "last_name" => "Bulsor",
            "age" => 16,
            "section_id" => 1,
        ]);

        $student3 = Student::create([
            "username" => "student3",
            "password" => Hash::make("12345678"),
            "first_name" => "Hanzel",
            "middle_name" => "Gretel",
            "last_name" => "Isad",
            "age" => 18,
            "section_id" => 1,
        ]);

        foreach($levels as $level) {
            factory(App\EducationalBackground::class)->create([
                'level' => $level,
                'user_id' => $student1->id,
            ]);

            factory(App\EducationalBackground::class)->create([
                'level' => $level,
                'user_id' => $student2->id,
            ]);

            factory(App\EducationalBackground::class)->create([
                'level' => $level,
                'user_id' => $student3->id,
            ]);
        }
    }
}
