<?php

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'name' => 'Ефим Потреба',
            'email' => 'efim@mail.com',
            'dob' => '2000-03-04',
            'phone' => '380777777771',
            'payment_type_id' => 1,
            'hourly_payment' => 0.0,
            'is_admin' => 1,
            'hired' => now(),
            'dismissed' => NULL,
            'password' => \Hash::make('0000'),
            'remember_token' => \Str::random(10),
        ]);

        Employee::create([
            'name' => 'Анастасия Макарова',
            'email' => 'nast@mail.com',
            'dob' => '2000-02-01',
            'phone' => '380777777772',
            'payment_type_id' => 1,
            'hourly_payment' => 0.0,
            'is_admin' => 0,
            'hired' => now(),
            'dismissed' => NULL,
            'password' => \Hash::make('0000'),
            'remember_token' => \Str::random(10),
        ]);

        Employee::create([
            'name' => 'Виктория Рябченко',
            'email' => 'vika@mail.com',
            'dob' => '2000-07-26',
            'phone' => '380777777773',
            'payment_type_id' => 1,
            'hourly_payment' => 0.0,
            'is_admin' => 0,
            'hired' => now(),
            'dismissed' => NULL,
            'password' => \Hash::make('0000'),
            'remember_token' => \Str::random(10),
        ]);

        Employee::create([
            'name' => 'Владислав Вовченко',
            'email' => 'vlad@mail.com',
            'dob' => '2000-01-04',
            'phone' => '380777777774',
            'payment_type_id' => 1,
            'hourly_payment' => 0.0,
            'is_admin' => 0,
            'hired' => now(),
            'dismissed' => NULL,
            'password' => \Hash::make('0000'),
            'remember_token' => \Str::random(10),
        ]);

        Employee::create([
            'name' => 'Марина Шульга',
            'email' => 'marina@mail.com',
            'dob' => '2000-10-04',
            'phone' => '380777777775',
            'payment_type_id' => 1,
            'hourly_payment' => 0.0,
            'is_admin' => 0,
            'hired' => now(),
            'dismissed' => NULL,
            'password' => \Hash::make('0000'),
            'remember_token' => \Str::random(10),
        ]);

        Employee::create([
            'name' => 'Ксения Горностаева',
            'email' => 'ksenia@mail.com',
            'dob' => '2000-11-14',
            'phone' => '380777777776',
            'payment_type_id' => 1,
            'hourly_payment' => 0.0,
            'is_admin' => 0,
            'hired' => now(),
            'dismissed' => NULL,
            'password' => \Hash::make('0000'),
            'remember_token' => \Str::random(10),
        ]);

        Employee::create([
            'name' => 'Теймураз Майсурадзе',
            'email' => 'timur@mail.com',
            'dob' => '2000-02-16',
            'phone' => '380777777777',
            'payment_type_id' => 1,
            'hourly_payment' => 0.0,
            'is_admin' => 0,
            'hired' => now(),
            'dismissed' => NULL,
            'password' => \Hash::make('0000'),
            'remember_token' => \Str::random(10),
        ]);

        Employee::create([
            'name' => 'Максим Бахруш',
            'email' => 'maks@mail.com',
            'dob' => '2000-05-22',
            'phone' => '380777777778',
            'payment_type_id' => 2,
            'hourly_payment' => 500.0,
            'is_admin' => 0,
            'hired' => now(),
            'dismissed' => NULL,
            'password' => \Hash::make('0000'),
            'remember_token' => \Str::random(10),
        ]);

        Employee::create([
            'name' => 'Тест Тестович',
            'email' => 'test@mail.com',
            'dob' => '2000-05-22',
            'phone' => '380777777729',
            'payment_type_id' => 2,
            'hourly_payment' => 500.0,
            'is_admin' => 0,
            'hired' => now(),
            'dismissed' => now(),
            'password' => \Hash::make('0000'),
            'remember_token' => \Str::random(10),
        ]);
    }
}
