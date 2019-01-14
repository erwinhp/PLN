<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Dus', function (Blueprint $table) {
      $table->increments('id');
      $table->string('Dusun');
      $table->integer('idDes')->unsigned();
      $table->foreign('idDes')->references('id')->on('Desa')->onDelete('cascade');
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
