<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follow_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('follower_id')->unsigned();
            $table->integer('following_id')->unsigned();
            // follow_type se su dung khi hai user follow lan nhau thi follow_type duoc set = 2 de giam so luong record phai luu tru. Neu 1 nguoi follow ng kia thi set follow_type = 1
            $table->integer('follow_type')->unsigned();

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
        Schema::drop('follow_events');
    }
}
