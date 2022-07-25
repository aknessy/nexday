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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('userUnique')->unique();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->enum('gender',['male','female']);
            $table->string('address');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->integer('dateofbirth')->nullable();
            $table->string('usertype')->default('user');
            $table->string('userrole')->default('user');
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('imageurl')->nullable();
            $table->json('gps_location')->nullable();
            $table->integer('autodot')->default(0);
            $table->integer('status');
            $table->boolean('under_review')->default(true);
            $table->boolean('suspended')->default(false);
            $table->integer('is_email_verified')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('password_text');
            $table->integer('password_changed_count')->default(0)->nullable();
            $table->rememberToken();
            $table->string('email_verify_token')->nullable();
            $table->timestamps();
            $table->integer('deleted')->default(0);
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
