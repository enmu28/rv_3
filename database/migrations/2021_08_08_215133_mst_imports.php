<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MstImports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_imports', function (Blueprint $table) {
            $table->increments('id')->from(1);;
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('tel_num')->nullable();
            $table->string('address')->nullable();
            $table->tinyInteger('is_active')->default(1);
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
        Schema::dropIfExists('mst_imports');
    }
}
