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
        Schema::create('userbid', function (Blueprint $table) {
            $table->id();
            $table->string('job_link');
            $table->string('client_name');
            $table->string('up_id');
            $table->tinyInteger('reply')->default('0');
            $table->integer('budget');
            $table->integer('userid');
            $table->date('date');
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
        Schema::dropIfExists('userbid');
    }
};
