<?php

use Illuminate\Database\Seeder;
class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factory(App\Barang::class,10)->create();
    }
}
