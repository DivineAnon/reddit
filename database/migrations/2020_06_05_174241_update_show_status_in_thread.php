<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateShowStatusInThread extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thread', function (Blueprint $table) {
            $table->tinyInteger('show_status')->default(0)->comment('0: show, 1: Hide, 2: Banned')->after('down_vote');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('thread', function (Blueprint $table) {
            //
        });
    }
}
