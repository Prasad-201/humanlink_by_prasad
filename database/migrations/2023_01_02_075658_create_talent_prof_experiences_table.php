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
        Schema::create('talent_prof_experiences', function (Blueprint $table) {
            $table->id();
            $table->integer('talent_idfk');
            $table->string('designation');
            $table->string('company_name');
            $table->string('skills');
            $table->text('roles_responsibilities');
            $table->enum('currently_work', ['Y', 'N']);
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('talent_prof_experiences');
    }
};
