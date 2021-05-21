<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_models', function (Blueprint $table) {
            $table->id();
            $table->integer('sid')->unsigned();
            $table->foreign('sid')->references('id')->on('student_models');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('transactionid');
            $table->string('date');
            $table->integer('amount');  
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
        Schema::dropIfExists('payment_models');
    }
}
