<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('playlist_song', function (Blueprint $table) {
//            $table->foreign('song_id')->references('id')->on('songs');
//            $table->foreign('playlist_id')->references('id')->on('playlists');
//        });
//
//        Schema::table('artist_song', function (Blueprint $table) {
//            $table->foreign('song_id')->references('id')->on('songs');
//            $table->foreign('artist_id')->references('id')->on('artists');
//        });
//
//        Schema::table('songs', function (Blueprint $table) {
//            $table->foreign('id')->references('id')->on('albums');
//        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreign_keys');
    }
}
