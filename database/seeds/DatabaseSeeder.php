<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminsTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(GradesTableSeeder::class);
        $this->call(LayoutTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(RegistrarsTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(TeachersTableSeeder::class);
    }
}
