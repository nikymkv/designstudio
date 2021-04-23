<?php

use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PaymentType::insert([
            ['name' => 'Проектная'],
            ['name' => 'Почасовая'],
        ]);
    }
}
