<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('name');
            $table->integer('phone')->unique()->nullable();
            $table->string('verification_token')->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('blood_group')->nullable();
            $table->string('gender')->nullable();
            $table->string('weight')->nullable();
            $table->integer('total_donated')->nullable();
            $table->boolean('emergency_contact')->default(false);
            $table->boolean('availability')->default(false);
            $table->string('email')->unique()->nullable();
            $table->string('facebook_url')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
