<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 60)->index();
            $table->string('phone', 12);
            $table->string('avatar')->nullable();
            $table->string('info_email', 255)->nullable();
            $table->string('admin_email', 255)->nullable();
            $table->string('sales_email', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('website', 255)->nullable();
            $table->text('description');
            $table->text('working_hours')->nullable();
            $table->unsignedBigInteger('pin')->nullable();
            $table->string('logo')->nullable(); # The status of this transaction (pending, success, or failure).  // All transactions will be added in the book, some can be refused
            $table->boolean('active')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('stores');
    }
}