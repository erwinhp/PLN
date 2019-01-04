<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Req extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('req', function (Blueprint $table) {
      $table->increments('id');
      $table->string('RtRw');
      $table->string('Status')->default('Dilihat');
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
