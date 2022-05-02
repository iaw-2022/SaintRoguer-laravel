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
            $table->string('imdb_id')->unique();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('type');
            $table->integer('year')->nullable();
            $table->Date('releaseDate')->nullable();
            $table->integer('duration')->nullable();
            $table->text('plot')->nullable();
            $table->integer('userRating')->default(0);
            $table->integer('imdbRating')->default(0);
            $table->string('director')->nullable();
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
