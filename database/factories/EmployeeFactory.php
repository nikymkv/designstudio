<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Employee;
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

$factory->define(Employee::class, function (Faker $faker) {
    $payment_type = rand(1, 2);
    $hourly_payment = $payment_type === 1 ? 2000.0 : 0.0;
    return [
        'name' => $this->faker->name,
        'email' => $this->faker->unique()->safeEmail,
        'dob' => $this->faker->date(),
        'phone' => $this->faker->e164PhoneNumber,
        'payment_type_id' => $payment_type,
        'specialization_id' => rand(1, 5),
        'hourly_payment' => $hourly_payment,
        'is_admin' => 0,
        'password' => \Hash::make('0000') // password
    ];
});
