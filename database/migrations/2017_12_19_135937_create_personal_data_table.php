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
            $table->string('mother_name');
            $table->string('mother_age');
            $table->string('mother_nationality');
            $table->string('mother_occupation');
            $table->string('mother_contact');
            $table->string('mother_work_address');
            $table->string('father_name');
            $table->string('father_age');
            $table->string('father_nationality');
            $table->string('father_occupation');
            $table->string('father_contact');
            $table->string('father_work_address');
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
