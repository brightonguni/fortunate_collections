<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email_address');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('whatsApp_telephone');
            $table->string('message');
            $table->string('subject');
            $table->unsignedBigInteger('service_id')->default(1);
            $table->unsignedBigInteger('licensor_id')->default(1);
            $table->unsignedBigInteger('store_id')->default(1);
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('licensor_id')->references('id')->on('licensors')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('active');
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
        Schema::dropIfExists('contacts');
    }
}