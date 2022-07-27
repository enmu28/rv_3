<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MstUpdateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mst_product', function (Blueprint $table) {
            $table->integer('season')->default(0);
            $table->longText('description')->nullable();
            $table->unsignedInteger('catagory_id');
            $table->foreign('catagory_id')->references('id')->on('mst_product_catagory')->onUpdate('cascade')
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
        Schema::dropIfExists('mst_product');
    }
}
