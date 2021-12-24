<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongPlaylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('song__playlists', function (Blueprint $table) {
            $table->bigInteger('sid')->unsigned();
            $table->bigInteger('pid')->unsigned();
            $table->unique(['sid', 'pid']);
            $table->foreign('sid')->references('sid')->on('songs')->onDelete('cascade');
            $table->foreign('pid')->references('pid')->on('playlists')->onDelete('cascade');
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
        Schema::dropIfExists('song__playlists');
    }
}
