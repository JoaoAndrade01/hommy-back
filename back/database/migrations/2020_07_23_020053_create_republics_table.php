<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepublicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('republics', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('street');
            $table->integer('number')->unsigned();
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state');
            $table->integer('size')->unsigned();
            $table->integer('bedrooms')->default(0)->unsigned();
            $table->integer('livingRoom')->default(0)->unsigned();
            $table->integer('bathrooms')->default(0)->unsigned();
            $table->integer('kitchens')->default(0)->unsigned();
            $table->integer('garages')->default(0)->unsigned();
            $table->unsignedBigInteger('user_id')->nullable();
        });
        Schema::table('republics', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('republics');
    }
}
