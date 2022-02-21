<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string('uuid_key');
            $table->unsignedBigInteger('customer_id');
            $table->string('status');
            $table->foreign('customer_id')->references('id')->on('users');
            $table->unsignedBigInteger('driver_id');
            $table->foreign('driver_id')->references('id')->on('users');
            $table->foreignId('market_id')->nullable()->constrained();
            $table->string('address');
            $table->string('total_price');
            $table->unsignedBigInteger('discount_voucher');
            $table->foreign('discount_voucher')->references('id')->on('vouchers');
            $table->unsignedBigInteger('shipping_voucher');
            $table->foreign('shipping_voucher')->references('id')->on('vouchers');
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
}
