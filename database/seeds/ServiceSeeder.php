<?php

use Illuminate\Database\Seeder;
use App\Models\Service;


class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::insert([
            ['name' => 'Разработка сайтов', 'type' => 'Интернет-магазин'],  // 1
            ['name' => 'Разработка сайтов', 'type' => 'Корпоративный сайт'],  // 2
            ['name' => 'Разработка сайтов', 'type' => 'Лендинг'],  // 3
            ['name' => 'Разработка сайтов', 'type' => 'Квиз'],  // 4
            ['name' => 'Создание фирменных стилей', 'type' => ''],  // 5
        ]); 
    }
}
