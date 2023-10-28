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
        Schema::create('job_details', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id_fk');
            $table->string('job_title_name');
            $table->string('job_profile');
            $table->integer('job_schedule');
            $table->integer('job_vacancy');
            $table->double('job_salary');
            $table->date('last_date_apply');
            $table->integer('job_exp_id');
            $table->integer('job_city_id');
            $table->string('job_location');
            $table->text('job_description');
            $table->text('job_responsibility');
            $table->string('job_qualifications');
            $table->string('company_name');
            $table->text('compony_detail');
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
        Schema::dropIfExists('job_details');
    }
};
