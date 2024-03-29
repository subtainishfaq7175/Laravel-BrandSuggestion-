<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->integer('avg_rate')->default(0);
            $table->integer('saleNot')->default(0);
            $table->integer('userid')->unsigned();
            $table->string('heading');
            $table->string('subheading');
            $table->string('category');
            $table->float('price');
            $table->string('domain_name');
            $table->text('description');
            $table->integer('rating')->nullable();
            $table->string('unitTime');


            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
}
