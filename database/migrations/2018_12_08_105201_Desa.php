<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Desa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Desa', function (Blueprint $table) {
      $table->increments('id');
      $table->string('Des');
      $table->integer('idKec')->unsigned();
      $table->foreign('idKec')->references('id')->on('Kec')->onDelete('cascade');
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
