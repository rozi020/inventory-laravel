<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Barang;
use Faker\Generator as Faker;

$factory->define(Barang::class, function (Faker $faker) {

$faker->addProvider(new \Mmo\Faker\PicsumProvider($faker));

	$list_barang = [
        	'AC',
        	'Proyektor',
        	'LCD',
        	'Meja',
        	'Kursi'
        ];

    return [
        'ruangan_id' => $faker->numberBetween($min = 1, $max = 5),
        'nama_barang' => $faker->randomElement($list_barang),
        'total' => $faker->numberBetween($min = 1, $max = 5),
        'broken' => $faker->numberBetween($min = 0, $max = 3),
        'image' => $faker->picsum('public/image',400, 400, false),
        'created_by' => 1
    ];
});
