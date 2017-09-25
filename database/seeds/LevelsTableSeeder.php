<?php

use App\Level;
use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $preschool = ['Nursery1', 'Nursery2', 'Kinder1', 'Kinder2', 'Preparatory1', 'Preparatory2'];

        foreach ($preschool as $level) {
            Level::create([
                'name' => $level,
            ]);
        }
        for ($i = 1; $i < 13; $i++) {
            Level::create([
                'name' => "Grade$i",
            ]);
        }

    }
}
