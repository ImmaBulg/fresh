<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutTabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_tabs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ru_title');
            $table->string('en_title');
            $table->text('ru_description')->nullable();
            $table->text('en_description')->nullable();
            $table->string('vimeo_id')->nullable();
            $table->integer('order')->default(100);
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('about_tabs');
    }
}
