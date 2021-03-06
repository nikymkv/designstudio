<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Project;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Project::class, function (Faker $faker) {
    $service_id = rand(1, 4);

    return [
        'name_company' => $this->faker->company,
        'scope' => $this->faker->sentence(),
        'date_created' => $this->faker->dateTime($timezone = 'Europe/Moscow'),
        'client_id' => 1, 
        'current_status_id' => 1,
        'service_id' => $service_id,
        'description' => $this->faker->text(),
        'answers' => [
            'url' => 'http://mywebsite.com',
            'site-modules' => 'module 1, module 2',
            'gamma' => 'my gamma',
            'photo' => 'my photo',
            'content' => 'yes',
            'celi' => 'my celi',
        ],
    ];
});
