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
            ['status_id' => 1, 'project_id' => 1, 'date_created' => date("Y-m-d H:i:s")],
            ['status_id' => 1, 'project_id' => 2, 'date_created' => date("Y-m-d H:i:s")],
            ['status_id' => 1, 'project_id' => 3, 'date_created' => date("Y-m-d H:i:s")],
            ['status_id' => 1, 'project_id' => 4, 'date_created' => date("Y-m-d H:i:s")],
            ['status_id' => 1, 'project_id' => 5, 'date_created' => date("Y-m-d H:i:s")],
        ]);
    }
}
