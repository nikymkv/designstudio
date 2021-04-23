<?php

use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Specialization::insert([
            ['name' => 'Арт-директор'],
            ['name' => 'Графический дизайнер'],
            ['name' => 'Веб-дизайнер'],
            ['name' => 'Маркетолог'],
            ['name' => 'Программист'],
        ]);
    }
}
