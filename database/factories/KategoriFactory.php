<?php

use Faker\Generator as Faker;

$factory->define(App\Kategori::class, function (Faker $faker) {
   $kategori = ['tanding', 'seni', 'power', 'tulis'];
   static $i = 0;
    return [
      'kategori' => $kategori[$i++],
      'atlit_id' => $faker->numberBetween(1, 20),
    ];
});
