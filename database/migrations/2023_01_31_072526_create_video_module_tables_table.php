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
        Schema::create('video_module_tables', function (Blueprint $table) {
            $table->increments('moduleId');
            $table->bigInteger('module_idfk')->unsigned()->index()->nullable();
            $table->foreign('module_idfk')->references('id')->on('video_modules')->onDelete('cascade');
            $table->string('videoModuleLink');
            $table->string('videoHeading');
            $table->enum('moduleType', array('link', 'file'));
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('video_module_tables');
    }
};
