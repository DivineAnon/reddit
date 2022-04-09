<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadVoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thread_vote', function (Blueprint $table) {
            $table->id();
            $table->string('thread_key');
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('vote_status')->default(1)->comment('1: Upvote, 2: Downvote');
            $table->timestamps();

            $table->foreign('thread_key')->references('thread_key')->on('thread')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thread_vote');
    }
}
