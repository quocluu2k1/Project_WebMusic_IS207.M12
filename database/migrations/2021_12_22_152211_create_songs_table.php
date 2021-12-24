<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->bigIncrements('sid');
            $table->string('sname');
            $table->string('url');
            $table->string('sphoto');
            $table->string('lyrics');
            $table->bigInteger('nviews');
            $table->bigInteger('cid')->unsigned();
            $table->bigInteger('siid')->unsigned();
            $table->foreign('cid')->references('cid')->on('categories')->onDelete('cascade');
            $table->foreign('siid')->references('siid')->on('singers')->onDelete('cascade');
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
        Schema::dropIfExists('songs');
    }
}
