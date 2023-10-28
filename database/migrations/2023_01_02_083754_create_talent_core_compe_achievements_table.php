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
        Schema::create('talent_core_compe_achievements', function (Blueprint $table) {
            $table->id();
            $table->integer('talent_idfk');
            $table->integer('core_competencie_idfk');
            $table->text('achievement')->nullable();
            $table->string('achievement_profile')->nullable();
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
        Schema::dropIfExists('talent_core_compe_achievements');
    }
};
