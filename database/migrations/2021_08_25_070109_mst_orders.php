<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MstOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->string('code_order')->unique();
            $table->integer('total_price');
            $table->tinyInteger('payment')->default(0);
            $table->tinyInteger('order_status')->default(1);
            $table->string('note_customer');
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('mst_customers')->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('mst_orders');
    }
}
