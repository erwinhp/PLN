<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Ket', function (Blueprint $table) {
      $table->increments('id');
      $table->string('RtRw');
      $table->integer('PotPel');
      $table->string('Keterangan');
      $table->integer('idDus')->unsigned();
      $table->foreign('idDus')->references('id')->on('Dusun')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
