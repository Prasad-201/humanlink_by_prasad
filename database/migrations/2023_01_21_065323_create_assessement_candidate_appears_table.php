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
        Schema::create('assessement_candidate_appears', function (Blueprint $table) {
            $table->increments('assCandAppearID');
            $table->unsignedInteger('assessmentsIdFk')->unsigned();
            $table->foreign('assessmentsIdFk')->references('assessments_id')->on('assessments');
            $table->unsignedBigInteger('talentIdFk')->unsigned();
            $table->foreign('talentIdFk')->references('id')->on('talent');
            $table->double('totalMark')->nullable();
            $table->double('attemptQuestion')->nullable();
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
        Schema::dropIfExists('assessement_candidate_appears');
    }
};
