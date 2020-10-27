<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('type', 100)->nullable();
            $table->string('title', 250)->nullable();
            $table->integer('duration')->nullable();
            $table->text('url_image')->nullable();
            $table->string('focus', 100)->nullable();
            $table->integer('quota')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->date('fecha_inicio_inscription')->nullable();
            $table->date('fecha_fin_inscription')->nullable();
            $table->string('place', 250)->nullable();
            $table->integer('cost')->nullable();
            $table->foreignId('id_owner');
            $table->foreign('id_owner')->references('id')->on('users');
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
        Schema::dropIfExists('courses');
    }
}
