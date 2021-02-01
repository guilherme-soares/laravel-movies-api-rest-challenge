<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
			$table->id();
			$table->string("name");
			$table->year("year");
			$table->string("sinopse");
			$table->string("duration", 5);
			$table->string("directors");
			$table->string("writers");
			$table->json("stars");
			$table->float("rating", 3, 1, true);
			$table->string("image");
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
        Schema::dropIfExists('movies');
    }
}
