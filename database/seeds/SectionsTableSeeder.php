<?php

use App\Section;
use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $section = new Section;
        $section->name = 'Gentlemen';
        $section->level_id = 18;
        $section->save();
    }
}
