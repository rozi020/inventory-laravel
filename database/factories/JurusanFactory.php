<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Jurusan;
use Faker\Generator as Faker;

$factory->define(Jurusan::class, function (Faker $faker) {

	$list_jurusan = [
			'Perhotelan',
			'Perpajakan',
			'Sistem Informasi',
			'Dokter Hewan',
			'Teknologi Informasi',
			'Akuntansi Perkantoran',
			'Bisnis Digital',
			'Hubungan Internasional',
			'Public Relation',
			'Tata Boga'

			];

    return [
        'id_fakultas' => $faker->numberBetween(1,10),
        'nama_jurusan' => $faker->unique()->randomElement($list_jurusan)
    ];
});
