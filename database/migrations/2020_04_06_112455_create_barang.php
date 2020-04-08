<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->bigIncrements('id_barang');
            $table->bigInteger('ruangan_id')->unsigned();
            $table->string('nama_barang', 50);
            $table->integer('total');
            $table->integer('broken');
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('barang', function ($table) {
         $table->foreign('ruangan_id')->references('id_ruangan')->on('ruangan')->onDelete('cascade');
            });
        Schema::table('barang', function ($table) {
            $table->foreign('created_by')->references('id_user')->on('users')->onDelete('cascade');
            });
        Schema::table('barang', function ($table) {
            $table->foreign('updated_by')->references('id_user')->on('users')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
