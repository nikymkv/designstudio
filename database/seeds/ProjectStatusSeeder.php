<?php

use Illuminate\Database\Seeder;

class ProjectStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ProjectStatus::insert([
            ['status_id' => 1, 'project_id' => 1, 'employee_id' => 1, 'date_created' => date("Y-m-d H:i:s")],
            ['status_id' => 1, 'project_id' => 2, 'employee_id' => 1, 'date_created' => date("Y-m-d H:i:s")],
            ['status_id' => 1, 'project_id' => 3, 'employee_id' => 1, 'date_created' => date("Y-m-d H:i:s")],
            ['status_id' => 1, 'project_id' => 4, 'employee_id' => 1, 'date_created' => date("Y-m-d H:i:s")],
            ['status_id' => 1, 'project_id' => 5, 'employee_id' => 1, 'date_created' => date("Y-m-d H:i:s")],
        ]);
    }
}
