<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_models', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staffid')->unsigned();
            $table->foreign('staffid')->references('id')->on('staff_models');
            $table->string("glevel",20);
            $table->string("course",20);
            $table->integer('coursefee');
            $table->integer('tutionfee');
            $table->integer('vaepfee');
            $table->integer('total');  
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
        Schema::dropIfExists('fee_models');
    }
}
