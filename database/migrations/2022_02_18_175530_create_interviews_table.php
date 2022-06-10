<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');

            $table->integer('applicant_id');
            $table->integer('vacancy_id');
            $table->string('platform');
            $table->string('url');
            $table->string('type');
            $table->boolean('active')->default(1);
            $table->string('status_finished')->nullable();
            $table->string('notes')->nullable();

            $table->dateTimeTz('date');

            $table->foreign('vacancy_id')->references('id')->on('vacancies');

            $table->timestampsTz();
        });

        Schema::create('interviews_history', function (Blueprint $table) {
            $table->id();

            $table->integer('interview_id');
            $table->string('description');

            $table->timestampsTz();

            $table->foreign('interview_id')->references('id')->on('interviews');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interviews');
        Schema::dropIfExists('interviews_history');
    }
}
