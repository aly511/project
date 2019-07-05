<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('prod_id');
            $table->string('name');
            $table->string('num');
            $table->string('price');
            $table->string('image');
            $table->string('total');
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
        Schema::dropIfExists('table_sessions');
    }
}
