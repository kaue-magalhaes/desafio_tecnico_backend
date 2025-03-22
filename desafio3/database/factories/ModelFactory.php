<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    $name = $faker->unique()->word . '_' . $faker->unique()->numberBetween(1, 10000);
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->sentence,
        'price' => $faker->randomFloat(2, 10, 1000),
        'category_id' => 1,
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    $name = $faker->word;
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->sentence,
    ];
});
