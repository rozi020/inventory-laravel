<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ruangan;
use Faker\Generator as Faker;

$factory->define(Ruangan::class, function (Faker $faker) {
    return [
        'nama_ruangan' => $faker->word,
        'jurusan_id' => $faker->numberBetween(1,10)
    ];
});
