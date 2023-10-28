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
        Schema::create('talent_certifications', function (Blueprint $table) {
            $table->id();
            $table->integer('talent_idfk');
            $table->string('course_name');
            $table->string('issue_organization');
            $table->date('issue_date');
            $table->date('expire_date')->nullable();
            $table->string('credential_id')->nullable();
            $table->string('credential_url')->nullable();
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
        Schema::dropIfExists('talent_certifications');
    }
};
