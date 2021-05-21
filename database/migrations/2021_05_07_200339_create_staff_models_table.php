<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name",30);
            $table->string("designation",30);
            $table->string("gender",20);
            $table->string("phone",12);
            $table->string("email",30)->unique();
            $table->string('password',30);
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
        Schema::dropIfExists('staff_models');
    }
}
