<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReminderModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminder_models', function (Blueprint $table) {
            $table->id();
            $table->integer('staffid')->unsigned();
            $table->foreign('staffid')->references('id')->on('staff_models');
            $table->integer('sid')->unsigned();
            $table->foreign('sid')->references('id')->on('student_models');
            $table->string('name');
            $table->string('message');
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
        Schema::dropIfExists('reminder_models');
    }
}
