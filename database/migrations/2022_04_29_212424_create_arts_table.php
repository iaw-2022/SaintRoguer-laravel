<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arts', function (Blueprint $table) {
            $table->id();
            $table->string('imdb_id')->unique()->nullable();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('type');
            $table->integer('year');
            $table->Date('releaseDate');
            $table->integer('duration');
            $table->text('plot');
            $table->integer('userRating')->default(0)->nullable();
            $table->integer('imdbRating')->default(0)->nullable();
            $table->string('director');
            $table->string('videoLink')->nullable();
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
        Schema::dropIfExists('arts');
    }
};
