<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ru_title');
            $table->string('en_title');
            $table->string('ru_description')->nullable();
            $table->string('en_description')->nullable();
            $table->string('en_photographer')->nullable();
            $table->string('ru_photographer')->nullable();
            $table->string('ru_executive')->nullable();
            $table->string('en_executive')->nullable();
            $table->string('ru_assistant')->nullable();
            $table->string('en_assistant')->nullable();
            $table->string('ru_client')->nullable();
            $table->string('en_client')->nullable();
            $table->text('imgs');
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
        Schema::dropIfExists('albums');
    }
}
