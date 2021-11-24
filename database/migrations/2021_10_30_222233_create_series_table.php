<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description',4000);
            $table->enum('plan',['free','basic','premium','gold'])->default('free');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade')->onUpdate('cascade');

            // $table->foreign('category_id')->references('id')->on('categories')
            //         ->onDelete('cascade')->onUpdate('cascade');        

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}
