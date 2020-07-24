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
            $table->string('name')->default(0);
            $table->string('street')->default(0);
            $table->integer('number')->default(0)->unsigned();
            $table->string('neighborhood')->default(0);
            $table->string('city')->default(0);
            $table->string('state')->default(0);
            $table->integer('size')->default(0)->unsigned();            
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
