<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersfinalmonth', function (Blueprint $table) {
            $table->id();
            //$table->increments('id');
            $table->integer('userid');
            $table->string('month_name');
            $table->integer('bus_target');
            $table->integer('total_bus');
            $table->tinyInteger('verify_report')->default('0');
            $table->tinyInteger('read_status')->default('0');
            $table->timestamps();
        });
        Schema::create('usermonthlybid', function (Blueprint $table) {
            $table->id();
            $table->integer('userid');
            $table->unsignedBigInteger('user_mnthf_id');
            $table->string('client_name');
            $table->string('up_id');
            $table->integer('total_bus');
            $table->integer('bus_target');
            $table->timestamps();
            $table->foreign('user_mnthf_id')->references('id')->on('usersfinalmonth')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usermonthlybid');
        Schema::dropIfExists('usersfinalmonth');
    }
};
