<?php

use App\Department;
use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Elementary', 'Junior', 'Senior',];

        foreach ($names as $name) {
            Department::create([
                'name' => $name,
            ]);
        }
    }
}
