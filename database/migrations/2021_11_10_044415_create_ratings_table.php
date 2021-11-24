<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rating');
            $table->morphs('rateable');
            $table->text('feedback');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->index('rateable_id');
            $table->index('rateable_type')->nullable();

            $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('rateable_id')->references('id')->on('series')
                    ->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('ratings');
    }
}
