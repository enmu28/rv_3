<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MstPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_auth');
            $table->string('post_title');
            $table->longText('post_content');
            $table->longText('post_excerpt');
            $table->string('post_name');
            $table->string('post_image');
            $table->integer('post_views');
            $table->unsignedInteger('catagory_id');
            $table->foreign('catagory_id')->references('id')->on('mst_post_catagory')->onUpdate('cascade')
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
        Schema::dropIfExists('mst_post');
    }
}
