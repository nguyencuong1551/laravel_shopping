<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->String('name')->nullable();
            $table->integer('phone')->nullable();
            $table->String('address')->nullable();
            $table->String('email')->nullable();
            $table->String('payment')->nullable();
            $table->String('nameSP')->nullable();
            $table->integer('promotion_price')->nullable();
            $table->String('note')->nullable();
            $table->integer('quantity')->nullable();
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
        Schema::dropIfExists('bills');
    }
}

