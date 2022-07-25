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
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->nullable();
            $table->string('name')->unique();
            $table->string('address')->nullable();
            $table->string('state', 3)->nullable();
            $table->string('city', 80)->nullable();
            $table->json('category');
            $table->text('description')->nullable();
            $table->float('longitude');
            $table->float('latitude');
            $table->integer('ratings')->default(0);
            $table->json('options')->nullable();
            $table->json('tags')->nullable();
            $table->string('logo', 80)->nullable();
            $table->integer('readTerms')->default(0);
            $table->timestamps();
            $table->integer('deleted')->default(0);
            $table->integer('published')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
};
