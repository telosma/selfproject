<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->timestamps();
            $table->integer('entry_id')->unsigned();    
            $table->integer('user_id')->unsigned();
            $table->text('content');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('entry_id')->references('id')->on('entries')->onDelete('cascade ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
