<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodeFansubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episode_fansub', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('link');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('episode_id')->nullable();
            $table->foreign('episode_id')->references('id')->on('episodes');
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
        Schema::dropIfExists('episode_fansub');
    }
}
