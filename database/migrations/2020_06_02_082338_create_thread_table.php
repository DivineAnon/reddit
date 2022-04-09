<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thread', function (Blueprint $table) {
            $table->id();
            $table->string('thread_key')->unique();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('gadget_id')->nullable();
            $table->string('title');
            $table->string('tags')->nullable();
            $table->tinyInteger('thread_type')->default(0)->comment('0 : Post Thread with article, 1 : Image Thread, 2 : Video/Embed Thread');
            $table->text('article')->nullable();
            $table->string('image')->nullable();
            $table->string('video_embed_link')->nullable();
            $table->integer('up_vote')->default(0)->nullable();
            $table->integer('down_vote')->default(0)->nullable();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thread');
    }
}
