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


$factory->define(CodeCommerce\User::class, function (Faker\Generator $faker) {
    return [
        'name'                      => $faker->name,
        'email'                     => $faker->email,
        'password'                  => bcrypt(str_random(10)),
        'remember_token'            => str_random(10),
    ];
});


$factory->define(CodeCommerce\Category::class, function (Faker\Generator $faker) {
    return [
        'name'                      => $faker->name,
        'description'               => $faker->sentence,

    ];
});

$factory->define(CodeCommerce\Product::class, function (Faker\Generator $faker) {
    return [
        'name'                      =>$faker->name,
        'description'               =>$faker->sentence,
        'price'                     =>$faker->randomNumber(3),
        'category_id'               =>$faker->numberBetween(1,15),
        'featured'                  =>$faker->numberBetween(0,0),
        'recommend'                 =>$faker->numberBetween(0,0),

    ];
});

