<?php

use Faker\Generator as Faker;

$factory->define(App\Official::class, function (Faker $faker) {
    return [
      'user_id' => $faker->numberBetween(1, 20),
      'nama' => $faker->name,
      'email' => $faker->unique()->safeEmail,
      'tgl_lahir' => $faker->date(),
      'jenis_kelamin' => $faker->boolean,
    ];
});
