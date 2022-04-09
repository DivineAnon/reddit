<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thread_report', function (Blueprint $table) {
            $table->id();
            $table->string('thread_key');
            $table->tinyInteger('report_type')->comment('0: Spam, 1: Inapproriate, 2: Other reason')->default(0);
            $table->text('other_reason')->nullable();
            $table->tinyInteger('report_status')->comment('0: Pending, 1: Ignored, 2: Action Taken')->default(0);
            $table->timestamps();

            $table->foreign('thread_key')->references('thread_key')->on('thread')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thread_report');
    }
}
