<?php

use App\Image;
use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //slideshow
        Image::create([
            'path' => 'images/school/pexels-photo',
            'ext' => 'jpg',
            'type' => 'slideshow',
            'position' => '1'
        ]);

        Image::create([
            'path' => 'images/sports/badminton elem',
            'ext' => 'png',
            'type' => 'slideshow',
            'position' => '2'
        ]);

        Image::create([
            'path' => 'images/sports/football',
            'ext' => 'png',
            'type' => 'slideshow',
            'position' => '3'
        ]);

        //whyJil

        Image::create([
            'path' => 'images/why/character',
            'ext' => 'png',
            'type' => 'whyJil',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.',
            'position' => '1'
        ]);

        Image::create([
            'path' => 'images/why/driven',
            'ext' => 'png',
            'type' => 'whyJil',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.',
            'position' => '2'
        ]);

        Image::create([
            'path' => 'images/why/leaders',
            'ext' => 'png',
            'type' => 'whyJil',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.',
            'position' => '3'
        ]);

        //tracks
        Image::create([
            'path' => 'images/tracks/stem',
            'ext' => 'jpg',
            'type' => 'tracks',
            'title' => 'Stem',
            'description' => 'Stem',
            'position' => '1'
        ]);

        Image::create([
            'path' => 'images/tracks/abm',
            'ext' => 'jpg',
            'type' => 'tracks',
            'title' => 'Abm',
            'description' => 'Abm',
            'position' => '2'
        ]);

        Image::create([
            'path' => 'images/tracks/ict',
            'ext' => 'jpg',
            'type' => 'tracks',
            'title' => 'Ict',
            'description' => 'Ict',
            'position' => '3'
        ]);

        Image::create([
            'path' => 'images/tracks/stem',
            'ext' => 'jpg',
            'type' => 'tracks',
            'title' => 'Stems',
            'description' => 'Stems',
            'position' => '4'
        ]);

        Image::create([
            'path' => 'images/tracks/abm',
            'ext' => 'jpg',
            'type' => 'tracks',
            'title' => 'Abms',
            'description' => 'Abms',
            'position' => '5'
        ]);

        Image::create([
            'path' => 'images/tracks/ict',
            'ext' => 'jpg',
            'type' => 'tracks',
            'title' => 'Icts',
            'description' => 'Icts',
            'position' => '6'
        ]);
    }
}
