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
/*        $section = new Section;
        $section->name = 'Gentlemen';
        $section->level_id = 18;
        $section->save();*/

        Section::create([
            'name' => 'Gentlemen',
            'level_id' => 18,
        ]);

        Section::create([
            'name' => 'Lero',
            'level_id' => 1,
        ]);

        Section::create([
            'name' => 'Gonor',
            'level_id' => 10,
        ]);
    }
}
