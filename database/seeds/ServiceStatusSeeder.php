<?php

use Illuminate\Database\Seeder;

class ServiceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\ServiceStatus::insert([
            // Разработка сайтов (интернет магазин)
            ['service_id' => 1, 'status_id' => 1,],
            ['service_id' => 1, 'status_id' => 2,],
            ['service_id' => 1, 'status_id' => 3,],
            ['service_id' => 1, 'status_id' => 4,],
            ['service_id' => 1, 'status_id' => 5,],
            ['service_id' => 1, 'status_id' => 7,],
            ['service_id' => 1, 'status_id' => 9,],
            ['service_id' => 1, 'status_id' => 10,],
            ['service_id' => 1, 'status_id' => 11,],
            ['service_id' => 1, 'status_id' => 12,],
            ['service_id' => 1, 'status_id' => 13,],
            ['service_id' => 1, 'status_id' => 14,],
            ['service_id' => 1, 'status_id' => 15,],
            ['service_id' => 1, 'status_id' => 23,],

            // Разработка сайтов (корпоративный сайт)
            ['service_id' => 2, 'status_id' => 1,],
            ['service_id' => 2, 'status_id' => 2,],
            ['service_id' => 2, 'status_id' => 3,],
            ['service_id' => 2, 'status_id' => 4,],
            ['service_id' => 2, 'status_id' => 6,],
            ['service_id' => 2, 'status_id' => 7,],
            ['service_id' => 2, 'status_id' => 10,],
            ['service_id' => 2, 'status_id' => 11,],
            ['service_id' => 2, 'status_id' => 12,],
            ['service_id' => 2, 'status_id' => 13,],
            ['service_id' => 2, 'status_id' => 14,],
            ['service_id' => 2, 'status_id' => 15,],
            ['service_id' => 2, 'status_id' => 23,],


            // Лендинг
            ['service_id' => 3, 'status_id' => 1,],
            ['service_id' => 3, 'status_id' => 2,],
            ['service_id' => 3, 'status_id' => 3,],
            ['service_id' => 3, 'status_id' => 4,],
            ['service_id' => 3, 'status_id' => 10,],
            ['service_id' => 3, 'status_id' => 11,],
            ['service_id' => 3, 'status_id' => 12,],
            ['service_id' => 3, 'status_id' => 13,],
            ['service_id' => 3, 'status_id' => 14,],
            ['service_id' => 3, 'status_id' => 15,],
            ['service_id' => 3, 'status_id' => 23,],

            // Квиз
            ['service_id' => 4, 'status_id' => 1,],
            ['service_id' => 4, 'status_id' => 3,],
            ['service_id' => 4, 'status_id' => 4,],
            ['service_id' => 4, 'status_id' => 8,],
            ['service_id' => 4, 'status_id' => 9,],
            ['service_id' => 4, 'status_id' => 10,],
            ['service_id' => 4, 'status_id' => 11,],
            ['service_id' => 4, 'status_id' => 12,],
            ['service_id' => 4, 'status_id' => 13,],
            ['service_id' => 4, 'status_id' => 14,],
            ['service_id' => 4, 'status_id' => 15,],
            ['service_id' => 4, 'status_id' => 23,],

            // Создание фирменных стилей
            ['service_id' => 5, 'status_id' => 16,],
            ['service_id' => 5, 'status_id' => 17,],
            ['service_id' => 5, 'status_id' => 18,],
            ['service_id' => 5, 'status_id' => 19,],
            ['service_id' => 5, 'status_id' => 20,],
            ['service_id' => 5, 'status_id' => 21,],
            ['service_id' => 5, 'status_id' => 22,],
            ['service_id' => 5, 'status_id' => 23,],
        ]);
    }
}
