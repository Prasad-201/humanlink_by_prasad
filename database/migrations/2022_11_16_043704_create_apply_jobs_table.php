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
        Schema::create('apply_jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('job_id_fk');
            $table->string('candidate_name');
            $table->string('candidate_email');
            $table->string('candidate_portfolio');
            $table->string('candidate_resume');
            $table->string('candidate_coverletter');
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
        Schema::dropIfExists('apply_jobs');
    }
};
