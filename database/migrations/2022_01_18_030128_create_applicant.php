<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email');
            $table->string('portfolio');
            $table->string('link_portfolio');
            $table->string('years_experience');

            $table->timestamps();
        });

        Schema::create('vacancies_applicants', function (Blueprint $table) {
            $table->id();

            $table->integer('applicant_id');
            $table->integer('vacancy_id');
            $table->string('aspiration_salary');

            $table->timestamps();
        });

        Schema::create('interviews', function (Blueprint $table) {
            $table->id();

            $table->integer('applicant_id');
            $table->integer('vacancy_id');
            $table->string('platform');
            $table->string('url');
            $table->string('type');

            $table->dateTime('hour');
            $table->dateTime('day');

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
        Schema::dropIfExists('applicants');
        Schema::dropIfExists('vacancies_applicants');
        Schema::dropIfExists('interviews');
    }
}
