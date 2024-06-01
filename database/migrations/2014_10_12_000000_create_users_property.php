<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->integer('price');
            $table->string('province');
            $table->text('description');
            // an array of images
            $table->text('images');
            $table->string('message');
            $table->unsignedBigInteger('propertyownerid');
            $table->foreign('propertyownerid')->references('id')->on('users');
            // add  a boolean  varialble to make the difference if it is for rent or for sale
            $table->boolean('forrent');
            $table->string('propertytype');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
