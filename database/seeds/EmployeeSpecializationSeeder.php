<?php

use Illuminate\Database\Seeder;

class EmployeeSpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\EmployeeSpecializations::insert([
            ['employee_id' => 1, 'specialization_id' => 1],
            ['employee_id' => 1, 'specialization_id' => 2],
            ['employee_id' => 1, 'specialization_id' => 3],

            ['employee_id' => 2, 'specialization_id' => 2],

            ['employee_id' => 3, 'specialization_id' => 3],

            ['employee_id' => 4, 'specialization_id' => 3],

            ['employee_id' => 5, 'specialization_id' => 4],

            ['employee_id' => 6, 'specialization_id' => 4],

            ['employee_id' => 7, 'specialization_id' => 4],

            ['employee_id' => 8, 'specialization_id' => 5],
        ]);
    }
}
