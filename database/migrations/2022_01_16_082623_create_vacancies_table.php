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

            $table->string('userId');
            $table->string('name', 50);
            $table->string('postulation_deadline', 20)->nullable();
            $table->text('description');
            $table->boolean('status');
            $table->string('salary', 10);
            $table->string('company', 30);
            $table->string('typeWork', 30);
            $table->string('job_location', 30);
            $table->text('skills');
            $table->string('hours_per_week', 30);
            $table->string('minimum_experience', 30);
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users');
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
