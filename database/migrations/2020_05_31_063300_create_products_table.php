<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->String('name')->nullable();
            $table->String('image')->nullable();
            $table->String('image1')->nullable();
            $table->String('image2')->nullable();
            $table->String('image3')->nullable();
            $table->String('description')->nullable();
            $table->integer('unit_price')->nullable();
            $table->integer('promotion_price')->nullable();
            $table->integer('id_category')->nullable();
            $table->integer('id_event')->nullable();
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
        Schema::dropIfExists('products');
    }
}

