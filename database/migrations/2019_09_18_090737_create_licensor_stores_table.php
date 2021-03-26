<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicensorStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licensor_stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('licensor_id');
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('user_id')->default(1);
            $table->boolean('own_store')->default(1);
            $table->boolean('isActive')->default(1);
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('licensor_id')->references('id')->on('licensors')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('licensor_stores');
    }
}
