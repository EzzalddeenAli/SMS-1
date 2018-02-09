<?php

use App\EducationalBackground;
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
            "lrn" => 107769050011,
            "username" => "student1",
            "password" => Hash::make("12345678"),
            "first_name" => "Lorem",
            "middle_name" => "Ipsum",
            "last_name" => "Enet",
            "age" => 15,
            "section_id" => 1,
        ]);

        $student2 = Student::create([
            "lrn" => 107769051001,
            "username" => "student2",
            "password" => Hash::make("12345678"),
            "first_name" => "Merol",
            "middle_name" => "Vold",
            "last_name" => "Bulsor",
            "age" => 16,
            "section_id" => 1,
        ]);

        $student3 = Student::create([
            "lrn" => 107769050001,
            "username" => "student3",
            "password" => Hash::make("12345678"),
            "first_name" => "Hanzel",
            "middle_name" => "Gretel",
            "last_name" => "Isad",
            "age" => 18,
            "section_id" => 1,
        ]);

        foreach($levels as $level) {
            EducationalBackground::create([
                'level' => $level,
                'name_of_school' => 'JILCS',
                'year_attended' => '20'.rand(0,1).rand(0,9).'-'.rand(1,12).'-'.rand(1,30),
                'honors_awards' => 'N/A',
                'user_id' => $student1->id,
                'user_type' => 'App\Student',
            ]);

            EducationalBackground::create([
                'level' => $level,
                'name_of_school' => 'JILCS',
                'year_attended' => '20'.rand(0,1).rand(0,9).'-'.rand(1,12).'-'.rand(1,30),
                'honors_awards' => 'N/A',
                'user_id' => $student2->id,
                'user_type' => 'App\Student',
            ]);

            EducationalBackground::create([
                'level' => $level,
                'name_of_school' => 'JILCS',
                'year_attended' => '20'.rand(0,1).rand(0,9).'-'.rand(1,12).'-'.rand(1,30),
                'honors_awards' => 'N/A',
                'user_id' => $student3->id,
                'user_type' => 'App\Student',
            ]);
/*            factory(EducationalBackground::class)->create([
                'level' => $level,
                'user_id' => $student1->id,
            ]);

            factory(EducationalBackground::class)->create([
                'level' => $level,
                'user_id' => $student2->id,
            ]);

            factory(EducationalBackground::class)->create([
                'level' => $level,
                'user_id' => $student3->id,
            ]);*/
        }
    }
}
