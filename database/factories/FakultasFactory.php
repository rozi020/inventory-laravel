<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Fakultas;
use Faker\Generator as Faker;

$factory->define(Fakultas::class, function (Faker $faker) {

	 $listFakultas = [
            'Fakultas Ekonomi Bisnis',
            'Fakultas Hukum',
            'Fakultas Ilmu Administrasi',
            'Fakultas Ilmu Budaya',
            'Fakultas Ilmu Kelautan',
            'Fakultas Ilmu Komputer',
            'Fakultas Ilmu Sosial dan Ilmu Politik',
            'Fakultas Kedokteran',
            'Fakultas Kedokteran Gigi',
            'Fakultas Kedokteran Hewan',
            'Fakultas Matematika dan Ilmu Pengetahuan Alam',
            'Fakultas Pendidikan Vokasi',
            'Fakultas Pertanian',
            'Fakultas Peternakan',
            'Fakultas Teknik',
            'Fakultas Teknologi Pertanian'
        ];


    return [
        'name' => $faker->unique()->randomElement($listFakultas)
    ];
});
