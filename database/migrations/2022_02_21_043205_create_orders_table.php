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
            $table->unsignedBigInteger('status_code');
            $table->foreign('customer_id')->references('id')->on('users');
            $table->unsignedBigInteger('driver_id');
            $table->foreign('driver_id')->references('id')->on('users');
            $table->foreignId('market_id')->nullable()->constrained();
            $table->text('address');

            $table->unsignedBigInteger('product_voucher_id')->nullable();
            $table->foreign('product_voucher_id')->references('id')->on('vouchers');
            $table->unsignedBigInteger('product_discount');

            $table->unsignedBigInteger('shipping_voucher_id')->nullable();
            $table->foreign('shipping_voucher_id')->references('id')->on('vouchers');
            $table->unsignedBigInteger('shipping_discount');
            $table->unsignedBigInteger('total_price');
            // $table->unsignedBigInteger('total_max_price');
            // $table->unsignedBigInteger('total_min_price');
            // $table->string('total_price');
            $table->string('payment_type');

            $table->string('paid');

           
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
