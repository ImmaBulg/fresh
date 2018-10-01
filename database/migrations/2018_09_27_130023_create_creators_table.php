<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creators', function (Blueprint $table) {
            $table->increments('id');
            $table->text('texts')->nullable();
            $table->text('videos')->nullable();
            $table->text('sliders')->nullable();
            $table->text('template')->nullable();
            $table->string('ru_title');
            $table->string('en_title');
            $table->text('ru_description')->nullable();
            $table->text('en_description')->nullable();
            $table->string('vimeo_id')->nullable();
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
        Schema::dropIfExists('creators');
    }
}
