<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Kk\Article::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3, 8),true);
    $isPublished = rand(0, 5) > 2;
    $createdAt = $faker->dateTimeBetween('-3 months', '-2 months');
    return [
        'category_id' => 1,
        'user_id' => 1,
        'slug' => Str::slug($title),
        'title' => $title,
        'short_text' => $faker->realText(100),
        'full_text' => $faker->realText(rand(1000, 4000)),
        'public' => $isPublished,
        'published_at' => $isPublished ? $faker->dateTimeBetween('-2 months', '-1 days') : null,
        'created_at' => $createdAt,
        'updated_at' => $createdAt
    ];
});
