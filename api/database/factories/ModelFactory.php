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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('secretp@ss'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\oauth_client::class, function (Faker\Generator $faker) {
    return [
        'id' => str_random(10),
        'secret' => str_random(10),
        'name' => $faker->url,
        'user_id' => $faker->randomDigitNotNull,
    ];
});

$factory->define(App\oauth_client_endpoint::class, function (Faker\Generator $faker) {
    return [
        'redirect_uri' => $faker->url,
    ];
});
$factory->define(App\Article::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence,
        'user_id' => $faker->randomDigitNotNull,
        'content' => $faker->paragraph,
    ];
});
