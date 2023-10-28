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
        Schema::create('talent', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email_address');
            $table->double('mobile_number');
            $table->string('password');
            $table->string('user_profile')->nullable();
            $table->string('linkedin_profile')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->text('address')->nullable();
            $table->string('city_name')->nullable();
            $table->double('pincode')->nullable();
            $table->string('position_applied')->nullable();
            $table->string('curret_employment_status')->nullable();
            $table->string('work_experience')->nullable();
            $table->string('notice_period')->nullable();
            $table->string('curret_ctc')->nullable();
            $table->string('expected_ctc')->nullable();
            $table->string('work_method_1')->nullable();
            $table->string('work_method_2')->nullable();
            $table->string('work_method_3')->nullable();
            $table->string('work_hour_1')->nullable();
            $table->string('work_hour_2')->nullable();
            $table->string('work_hour_3')->nullable();
            $table->string('emp_resume')->nullable();
            $table->string('interest')->nullable();
            $table->text('introduction')->nullable();
            $table->enum('international_client', ['Yes', 'No'])->nullable();
            $table->integer('role')->default(1);
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
        Schema::dropIfExists('talent');
    }
};
