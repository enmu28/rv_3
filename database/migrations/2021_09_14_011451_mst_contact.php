<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MstContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_address');
            $table->string('contact_phone');
            $table->longText('content');
            $table->dateTime('created_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_contact');
    }
}
