<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SpecializationSeeder::class);
        $this->call(PaymentTypeSeeder::class);
        
        $this->call(ServiceSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(ServiceStatusSeeder::class);

        $this->call(EmployeeSeeder::class);
        factory(\App\Models\Client::class, 5)->create()->each(function($client) {
            $client->project()->saveMany(factory(\App\Models\Project::class, 1)->create());
        });

        $this->call(ProjectStatusSeeder::class);
        $this->call(EmployeeSpecializationSeeder::class);
    }
}
