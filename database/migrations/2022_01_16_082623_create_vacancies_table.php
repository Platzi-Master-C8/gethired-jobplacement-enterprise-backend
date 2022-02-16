<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_id');
            $table->dateTime('postulation_deadline', 20)->nullable();
            $table->text('description');
            $table->boolean('status');
            $table->integer('salary');
            $table->integer('company_id');
            $table->string('typeWork');
            $table->string('job_location');
            $table->text('skills');
            $table->integer('hours_per_week');
            $table->integer('minimum_experience');
            $table->timestampsTz();

            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancies');
    }
}
