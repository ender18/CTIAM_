<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseFociTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_foci', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id');
            $table->foreignId('foci_id');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('foci_id')->references('id')->on('foci');

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
        Schema::dropIfExists('course_foci');
    }
}
