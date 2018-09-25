<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('ru_title');
            $table->string('en_title');
            $table->string('ru_subtitle');
            $table->string('en_subtitle');
            $table->text('ru_description')->nullable();
            $table->text('en_description')->nullable();
            $table->string('ru_direction')->nullable();
            $table->string('en_direction')->nullable();
            $table->string('ru_dop')->nullable();
            $table->string('en_dop')->nullable();
            $table->string('ru_executive')->nullable();
            $table->string('en_executive')->nullable();
            $table->string('ru_producer')->nullable();
            $table->string('en_producer')->nullable();
            $table->string('ru_agency')->nullable();
            $table->string('en_agency')->nullable();
            $table->string('ru_client')->nullable();
            $table->string('en_client')->nullable();
            $table->string('vimeo_id');
            $table->integer('order')->default(100);
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
        Schema::dropIfExists('videos');
    }
}
