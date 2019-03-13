<?php

use Faker\Generator as Faker;

$factory->define(LaracastClone\Lesson::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'description' => $faker->paragraph(3),
        'series_id' => function() {
            return factory(\LaracastClone\Series::class)->create()->id;
        },
        'episode_number' => 100,
        'video_id' => '316715538'
    ];
});
