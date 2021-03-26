<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('first_name', 60)->nullable();
            $table->string('last_name', 60)->nullable();
            $table->string('phone', 10)->nullable();
            $table->string('email');
            $table->string('avatar')->nullable();
            $table->string('id_number')->nullable();
            $table->string('Passport')->nullable();
            $table->string('nationality')->nullable();
            $table->string('activation_token')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_picture')->nullable(); #
            $table->string('address', 255)->nullable();
            $table->string('password');
            $table->boolean('active')->default(1);
            $table->unsignedBigInteger('role_id')->index();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
}