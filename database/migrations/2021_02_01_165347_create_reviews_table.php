<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->string('description');
			$table->float("rating", 3, 1, true);
			$table->unsignedBigInteger('movie_id');
			$table->unsignedBigInteger('user_id');
			$table->timestamps();

			$table->foreign('movie_id')->references('id')->on('movies');
			$table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
