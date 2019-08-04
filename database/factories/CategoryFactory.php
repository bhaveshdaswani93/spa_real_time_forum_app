<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    $category = $faker->word;
    return [
        'name' => $category,
        'slug' => Str::slug($category)
    ];
});
