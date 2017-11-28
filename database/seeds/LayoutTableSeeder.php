<?php

use Illuminate\Database\Seeder;

use App\Layout;
class LayoutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Layout::create([
            'path' => 'images/school/pexels-photo.jpg',
            'type' => 'slideshow',
            'position' => '1'
        ]);

        Layout::create([
            'path' => 'images/sports/badminton elem.png',
            'type' => 'slideshow',
            'position' => '2'
        ]);

        Layout::create([
            'path' => 'images/sports/football.png',
            'type' => 'slideshow',
            'position' => '3'
        ]);

        Layout::create([
            'path' => 'images/tracks/stem.jpg',
            'type' => 'tracks',
            'title' => 'Stem',
            'description' => 'Stem',
            'position' => '1'
        ]);

        Layout::create([
            'path' => 'images/tracks/abm.jpg',
            'type' => 'tracks',
            'title' => 'Abm',
            'description' => 'Abm',
            'position' => '2'
        ]);

        Layout::create([
            'path' => 'images/tracks/ict.jpg',
            'type' => 'tracks',
            'title' => 'Ict',
            'description' => 'Ict',
            'position' => '3'
        ]);

        Layout::create([
            'path' => 'images/tracks/stem.jpg',
            'type' => 'tracks',
            'title' => 'Stems',
            'description' => 'Stems',
            'position' => '4'
        ]);

        Layout::create([
            'path' => 'images/tracks/abm.jpg',
            'type' => 'tracks',
            'title' => 'Abms',
            'description' => 'Abms',
            'position' => '5'
        ]);

        Layout::create([
            'path' => 'images/tracks/ict.jpg',
            'type' => 'tracks',
            'title' => 'Icts',
            'description' => 'Icts',
            'position' => '6'
        ]);
    }
}
