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
        Schema::create('talent_core_competencies', function (Blueprint $table) {
            $table->id();
            $table->integer('talent_idfk');
            $table->string('position_open_for');
            $table->text('application_tool_used');
            $table->string('portfolio')->nullable();
            $table->text('skills');
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
        Schema::dropIfExists('talent_core_competencies');
    }
};
