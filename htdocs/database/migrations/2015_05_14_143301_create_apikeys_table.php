<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApikeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apikeys', function(Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->integer('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->string('api_key');
            $table->string('app_name');
            $table->text('app_desc');
            $table->integer('request_limit');
            $table->integer('request_count');
            $table->boolean('approved');
            //$table->date('create_date');
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
        Schema::drop('apikeys');
    }
}
