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
        Schema::create('assessment_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('assessments_idfk')->unsigned();
            $table->foreign('assessments_idfk')->references('assessments_id')->on('assessments');
            $table->text('assessment_question');
            $table->text('assessment_option_1');
            $table->text('assessment_option_2');
            $table->text('assessment_option_3')->nullable();
            $table->text('assessment_option_4')->nullable();
            $table->enum('assessment_answer', ['A', 'B', 'C', 'D']);
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
        Schema::dropIfExists('assessment_questions');
    }
};
