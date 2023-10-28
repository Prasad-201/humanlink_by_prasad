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
        Schema::create('hire_talent_open_positions', function (Blueprint $table) {
            $table->id();
            $table->integer('hireTalent_idfk');
            $table->string('position_unique_id');
            $table->string('developer_role');
            $table->text('skills');
            $table->string('working_time_zone');
            $table->string('working_with_period');
            $table->string('time_period');
            $table->integer('experience_required');
            $table->string('onboard_time_period');
            $table->integer('required_developers')->nullable();
            $table->integer('relevent_option')->nullable();
            $table->integer('from')->nullable();
            $table->integer('to')->nullable();
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
        Schema::dropIfExists('hire_talent_open_positions');
    }
};
