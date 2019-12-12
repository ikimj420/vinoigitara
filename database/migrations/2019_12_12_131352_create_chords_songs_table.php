<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChordsSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chords_songs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('song_id')->nullable();
            $table->unsignedBigInteger('chord_id')->nullable();
            $table->timestamps();

            $table->foreign('song_id')
                ->references('id')->on('songs')
                ->onDelete('cascade');

            $table->foreign('chord_id')
                ->references('id')->on('chords')
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
        Schema::dropIfExists('chords_songs');
    }
}
