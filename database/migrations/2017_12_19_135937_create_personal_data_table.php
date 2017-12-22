<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_data', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('gender', ['male', 'female']);
            $table->date('birthday');
            $table->string('birth_place');
            $table->string('nationality');
            $table->string('religion');
            $table->string('school_last_attended');
            $table->string('level_applied');
            $table->morphs('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_data');
    }
}
