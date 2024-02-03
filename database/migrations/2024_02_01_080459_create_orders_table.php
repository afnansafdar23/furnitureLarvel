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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_no');
            $table->string('product_id');
            $table->string('totalprice');
            $table->string('quantity');
            $table->string('size');
            $table->string('color');
            $table->string('userid');
            $table->string('Address');
            $table->string('delivery_status')->default('pending');
            $table->string('payment_method')->default('COD');            $table->string('payment_status')->default('pending');
            $table->string('update_payment_status');


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
        Schema::dropIfExists('orders');
    }
};
