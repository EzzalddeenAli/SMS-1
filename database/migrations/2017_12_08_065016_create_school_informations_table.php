<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('school_name');
            $table->string('address');
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('zip')->nullable();
            $table->string('phone')->nullable();
            $table->string('administrator');
            $table->string('website')->nullable();
            $table->string('short_name');
            $table->string('school_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_informations');
    }
}
