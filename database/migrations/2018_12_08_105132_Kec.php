<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kec extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Kec', function (Blueprint $table) {
      $table->increments('id');
      $table->string('kecamatan');
      $table->integer('idKab')->unsigned();
      $table->foreign('idKab')->references('id')->on('Kab')->onDelete('cascade');
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
