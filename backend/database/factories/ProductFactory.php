<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    $product = $faker->sentence;
    return [
        'name' => $product,
        'slug' => Str::slug($product),
        'type' => $faker->word,
        'description' => $faker->paragraph,
        'price' => $faker->randomNumber($nbDigits = 6, $strict = true),
        'qty' => 10
    ];
});
