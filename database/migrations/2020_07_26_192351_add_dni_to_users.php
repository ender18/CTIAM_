<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDniToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('type_dni', 30)->nullable();
            $table->bigInteger('dni')->nullable();
            $table->string('last_name', 200)->nullable();
            $table->date('birthdate')->nullable();
            $table->string('adress', 240)->nullable();
            $table->string('neighborhood', 240)->nullable();
            $table->string('commune', 100)->nullable();
            $table->bigInteger('phone')->nullable();
            $table->string('civil_status', 100)->nullable();
            $table->boolean('has_children')->nullable();
            $table->string('level_study', 200)->nullable();
            $table->string('last_study', 200)->nullable();
            $table->string('degree', 200)->nullable();
            $table->boolean('study_actually')->nullable();
            $table->string('what_studies', 200)->nullable();
            $table->boolean('work_actually')->nullable();
            $table->string('laboral_sector', 200)->nullable();
            $table->boolean('bussiness_owner')->nullable();
            $table->string('way_working', 200)->nullable();
            $table->string('type_company', 200)->nullable();
            $table->string('time_not_to_work', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
