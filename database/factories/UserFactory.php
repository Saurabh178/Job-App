<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Company;
use App\Job;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_type' => 'seeker',
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Job::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'company_id' => Company::all()->random()->id,
        'title' => $title = $faker->text,
        'slug' => str_slug($title),
        'position' => $faker->jobTitle,
        'address' => $faker->address,
        'category_id' => rand(1,5),
        'type' => 'fulltime',
        'status' => rand(0,1),
        'description' => $faker->paragraph(rand(2,10)),
        'roles' => $faker->text,
        'last_date' => $faker->DateTime,
    ];
});

$factory->define(Company::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'cname' => $cname = $faker->company,
        'slug' => str_slug($cname),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'website' => $faker->domainName,
        'logo' => 'avatar_1.png',
        'cover_photo' => 'office.jpg',
        'slogan' => 'Learn Earn and Grow',
        'description' => $faker->paragraph(rand(2,10)),
    ];
});
