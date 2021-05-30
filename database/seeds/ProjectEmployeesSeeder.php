<?php

use Illuminate\Database\Seeder;

class ProjectEmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ProjectEmployees::insert([
            ['employee_id' => 1, 'project_id' => 1],
            ['employee_id' => 1, 'project_id' => 2],
            ['employee_id' => 1, 'project_id' => 3],
            ['employee_id' => 1, 'project_id' => 4],
            ['employee_id' => 1, 'project_id' => 5],
        ]);
    }
}
