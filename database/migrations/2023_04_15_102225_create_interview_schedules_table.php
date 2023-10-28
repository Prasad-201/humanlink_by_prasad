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
        Schema::create('interview_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empoyer_id');
            $table->unsignedBigInteger('candidate_id');
            $table->foreign('empoyer_id')->references('id')->on('hire_talent');
            $table->foreign('candidate_id')->references('id')->on('talent');
            $table->date('interview_date');
            $table->time('interview_time');
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
        Schema::dropIfExists('interview_schedules');
    }
};
