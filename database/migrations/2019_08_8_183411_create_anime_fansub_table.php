<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimeFansubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anime_fansub', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('link');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('anime_id')->nullable();
            $table->foreign('anime_id')->references('id')->on('animes');
            $table->unsignedBigInteger('fansub_id')->nullable();
            $table->foreign('fansub_id')->references('id')->on('fansubs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anime_fansub');
    }
}
