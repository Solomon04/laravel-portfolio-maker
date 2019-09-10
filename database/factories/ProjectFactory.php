<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Project::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'image' => env('APP_URL') . '/img/demo-image-01.jpg',
        'title' => 'FAVR Rest API',
        'description' => $faker->paragraph,
        'skills' => ['Laravel', 'Lumen', 'Unit Tests', 'CI/CD', 'REST'],
        'call_to_action' => ['name' => 'View Documentation', 'url' => '#']
    ];
});
