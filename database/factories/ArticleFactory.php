<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Article;
use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->text(100),
        'text' => $faker->text(700),
        'category' => $faker->randomElement( ['Php','Symfony', 'Laravel']),
        'created_at' => now(),
    ];
});
