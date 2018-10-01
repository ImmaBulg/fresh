<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ru_contacts')->default(null);
            $table->string('en_contacts')->default(null);
            $table->string('map')->default(null);
            $table->string('ru_executive')->default(null);
            $table->string('en_executive')->default(null);
            $table->string('ru_executive_two')->default(null);
            $table->string('en_executive_two')->default(null);
            $table->string('ru_producer')->default(null);
            $table->string('en_producer')->default(null);
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
        Schema::dropIfExists('contact_page');
    }
}
