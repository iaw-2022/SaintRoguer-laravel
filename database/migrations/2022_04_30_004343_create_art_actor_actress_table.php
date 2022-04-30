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
        Schema::create('art_actor_actress', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('art_id');
            $table->unsignedBigInteger('actor_actress_id');
            $table->timestamps();

            $table->foreign('art_id')->references('id')->on('arts')->onDelete('cascade');
            $table->foreign('actor_actress_id')->references('id')->on('actor_actresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('art_actor_actress');
    }
};
