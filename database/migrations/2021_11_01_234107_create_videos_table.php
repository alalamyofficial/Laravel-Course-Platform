<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('user_id');
            $table->text('description');
            $table->string('video')->nullable();
            $table->unsignedInteger('episode_number')->nullable();
            $table->unsignedBigInteger('series_id');
            $table->timestamps();

            $table->foreign('series_id')->references('id')->on('series')
                    ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
