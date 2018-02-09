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
            $table->string('mother_name')->nullable();
            $table->integer('mother_age')->nullable();
            $table->string('mother_nationality')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->unsignedBigInteger('mother_contact')->nullable();
            $table->string('mother_work_address')->nullable();
            $table->string('father_name')->nullable();
            $table->integer('father_age')->nullable();
            $table->string('father_nationality')->nullable();
            $table->string('father_occupation')->nullable();
            $table->unsignedBigInteger('father_contact')->nullable();
            $table->string('father_work_address')->nullable();
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
