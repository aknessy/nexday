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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('target_id');//Id of the review type (i.e product_id, shop_id, property_id, apartment_id)
            $table->enum('type', ['product', 'shop', 'property', 'apartment']);//Review for products, shop, property or apartment
            $table->string('comment');
            $table->integer('impression');//Number of star ratings 
            $table->enum('was_helpful', ['yes','no']);
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
        Schema::dropIfExists('reviews');
    }
};
