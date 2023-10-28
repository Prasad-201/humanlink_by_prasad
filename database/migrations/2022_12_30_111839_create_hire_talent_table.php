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
        Schema::create('hire_talent', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email_address');
            $table->string('company_name');
            $table->string('password');
            $table->double('mobile_number');
            $table->string('hiretalent_profile')->nullable();
            $table->string('designation')->nullable();
            $table->integer('experience')->nullable();
            $table->string('linkedIn_profile')->nullable();
            $table->string('skype_profile')->nullable();

            $table->string('domain_name')->nullable();
            $table->integer('company_size')->nullable();
            $table->string('city_name')->nullable();
            $table->string('state_name')->nullable();
            $table->string('country_name')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('address')->nullable();
            
            $table->integer('role')->nullable(2);
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
        Schema::dropIfExists('hire_talent');
    }
};
