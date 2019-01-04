<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Kab', function (Blueprint $table) {
      $table->increments('id');
      $table->string('kabupaten');
      $table->integer('idProv')->unsigned();
      $table->foreign('idProv')->references('id')->on('Prov')->onDelete('cascade');
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
