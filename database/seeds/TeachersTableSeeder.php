<?php

use App\Teacher;
use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::create([
            "username" => "teacher1",
            "password" => Hash::make("12345678"),
            "first_name" => "Charlie",
            "middle_name" => "Merriam",
            "last_name" => "Dolor",
            "age" => 15,
            "advisory" => 1,
        ]);
    }
}
