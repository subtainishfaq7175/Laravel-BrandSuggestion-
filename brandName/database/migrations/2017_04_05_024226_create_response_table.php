<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('response', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('rid')->unsigned();
            $table->integer('productid')->unsigned();
            $table->integer('sallerid')->unsigned();
            $table->integer('rating')->nullable();

            $table->foreign('rid')->references('id')->on('domain_request')->onDelete('cascade');
            $table->foreign('productid')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('sallerid')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('response');
    }
}
