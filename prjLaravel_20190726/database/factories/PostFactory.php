<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;
use App\User;

$factory->define(Post::class, function (Faker $faker) {
    $listUserID = User::pluck('id');
    return [
        'name' => $faker->name,
        'user_id' => $faker->randomElement($listUserID)
    ];
});
