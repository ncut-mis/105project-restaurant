<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CouponsStatuses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cou_id');
            $table->unsignedInteger('mem_id');
            $table->unsignedInteger('rec_id');
            $table->boolean('status');
            $table->dateTime('StartTime');
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
        Schema::dropIfExists('coupons_statuses');
    }
}
