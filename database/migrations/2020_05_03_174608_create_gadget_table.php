<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGadgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gadget', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('brand_id');
            $table->string('year_released');
            $table->string('image')->nullable();
            $table->integer('price');
            $table->string('screen_size')->comment('in inch');
            $table->string('resolution')->comment('in pixels');
            $table->string('camera_pixel')->comment('in MP');
            $table->string('ram')->comment('in GB');
            $table->string('chip');
            $table->string('battery')->comment('in mAh');
            $table->string('os');
            $table->string('storage')->comment('in GB');

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
        Schema::dropIfExists('gadget');
    }
}
