<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'username' => 'admin',
            'password' => Hash::make('12345678'),
            'first_name' => 'Rodrigo',
            'middle_name' => 'Roa',
            'last_name' => 'Duterte'
        ]);
    }
}
