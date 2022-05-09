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
            $table->string('title');
            $table->string('unit');
            $table->string('sub_unit');
            $table->text('description');
            $table->unsignedBigInteger('min_qty_per_unit')->nullable();
            $table->unsignedBigInteger('max_qty_per_unit')->nullable();
            $table->unsignedBigInteger('min_price');
            $table->unsignedBigInteger('max_price');
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
