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
        Schema::create('talent_testimonials', function (Blueprint $table) {
            $table->id();
            $table->integer('talent_idfk');
            $table->string('client_name')->nullable();
            $table->string('company_name')->nullable();
            $table->text('testimonial');
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
        Schema::dropIfExists('talent_testimonials');
    }
};
