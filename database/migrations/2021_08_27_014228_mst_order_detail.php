<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MstOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('mst_order_detail', function (Blueprint $table) {
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('product_id');
            $table->integer('product_price');
            $table->integer('quantity');
            $table->foreign('order_id')->references('order_id')->on('mst_orders')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('product_id')->references('product_id')->on('mst_product')->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('mst_order_detail');
    }
}
