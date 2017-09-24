<?php

use App\Registrar;
use Illuminate\Database\Seeder;

class RegistrarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Registrar::create([
            "username" => "registrar",
            "password" => Hash::make("12345678"),
            "first_name" => "Deserunt",
            "middle_name" => "Mollit",
            "last_name" => "Anim",
            "age" => 15,
        ]);
    }
}
