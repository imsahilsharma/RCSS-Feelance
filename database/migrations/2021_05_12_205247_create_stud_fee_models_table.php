<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudFeeModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stud_fee_models', function (Blueprint $table) {
            $table->id();
            $table->integer('sid')->unsigned();
            $table->foreign('sid')->references('id')->on('student_models');
            $table->string('name');
            $table->string('email')->unique();
            $table->string("glevel",20);
            $table->string("course",20);
            $table->integer('tot_fees');  
            $table->integer('paid');
            $table->integer('due');
            $table->string('status')->default('Due');
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
        Schema::dropIfExists('stud_fee_models');
    }
}
