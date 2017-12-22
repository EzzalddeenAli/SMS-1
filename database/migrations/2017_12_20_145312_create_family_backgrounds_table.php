<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyBackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_backgrounds', function (Blueprint $table) {
            $table->increments('id');
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
        Schema::dropIfExists('family_backgrounds');
    }
}
