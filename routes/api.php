<?php

use App\Http\Controllers\Api\v1\ApplicationController;
use App\Http\Controllers\Api\v1\CompanyController;
use App\Http\Controllers\Api\v1\InterviewController;
use App\Http\Controllers\Api\v1\SkillController;
use App\Http\Controllers\Api\v1\TypeWorkController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\VacancyController;

use Illuminate\Support\Facades\Route;

Route::get('v1/users', [UserController::class, 'index'])->name('users.index');

Route::get('check-auth0', function () {
    return response()->json([
        'message' => 'Secure Zone by token auth0',
    ]);
})->middleware('jwt.auth0');

Route::get('/v1/vacancies', [VacancyController::class, 'index'])->name('vacancies.index');
Route::get('/v1/vacancies/{id}', [VacancyController::class, 'indexFindOne'])->name('vacancies.indexFindOne');

Route::get('v1/vacancies/{vacancy}/applications', [ApplicationController::class, 'listApplicants'])->name('vacancies.applications.list');
Route::post('v1/vacancies/{vacancy}/applications', [ApplicationController::class, 'applyVacancy'])->name('vacancies.applications.apply');
Route::post('/v1/vacancies', [VacancyController::class, 'store'])->name('vacancies.store');
Route::put('/v1/vacancies/{id}', [VacancyController::class, 'update'])->name('vacancies.update');
Route::delete('/v1/vacancies/{id}', [VacancyController::class, 'destroy'])->name('vacancies.destroy');

Route::patch('v1/vacancies-status-active/{id}', [VacancyController::class, 'patchActive'])->name('status.active.patch');
Route::patch('v1/vacancies-status-inactive/{id}', [VacancyController::class, 'patchInactive'])->name('status.inactive.patch');
Route::get('v1/vacancies-actives', [VacancyController::class, 'vacanciesActives'])->name('vacancies.allActives');
Route::get('v1/vacancies-inactives', [VacancyController::class, 'vacanciesInactives'])->name('vacancies.allInactives');
Route::get('v1/vacancies-job-location', [VacancyController::class, 'vacanciesJobLocation'])->name('vacancies.jobLocation');
Route::get('v1/vacancies-salary', [VacancyController::class, 'vacanciesSalary'])->name('vacancies.salary');
Route::post('v1/filter', [VacancyController::class, 'filter'])->name('vacancies.filter');

Route::prefix('v1')->group(function () {
    Route::name('v1.')->group(function () {
        // interview routes
        Route::prefix('interviews')->group(function () {
            Route::name('interviews.')->group(function () {
                Route::get('', [InterviewController::class, 'index'])->name('index');
                Route::post('', [InterviewController::class, 'store'])->name('store');

                Route::get('{interview}', [InterviewController::class, 'show'])->name('show');
                Route::patch('{interview}/reschedule', [InterviewController::class, 'reschedule'])->name('reschedule');
                Route::patch('{interview}/cancel', [InterviewController::class, 'cancel'])->name('cancel');
                Route::patch('{interview}/finish', [InterviewController::class, 'finish'])->name('finish');
            });
        });

        // company routes
        Route::prefix('companies')->group(function () {
            Route::name('companies.')->group(function () {
                Route::get('', [CompanyController::class, 'list'])->name('list');
                Route::post('', [CompanyController::class, 'store'])->name('store');
                Route::get('select', [CompanyController::class, 'listAsSelect'])->name('list-select');
                Route::get('vacancies', [CompanyController::class, 'listWithVacancies'])->name('list-with-vacancies');

                //Route::get('{company}/show', [CompanyController::class, 'show'])->name('show');
                Route::get('{company}/show-with-vacancies', [CompanyController::class, 'showWithVacancies'])->name('show-with-vacancies');
                Route::get('/{id}', [CompanyController::class, 'indexFindOne'])->name('indexFindOne');

                Route::patch('{company}', [CompanyController::class, 'update'])->name('update');
            });
        });

        // skill routes
        Route::prefix('skills')->group(function () {
            Route::name('skills.')->group(function () {
                Route::get('', [SkillController::class, 'list'])->name('list');
                Route::post('', [SkillController::class, 'store'])->name('store');
            });
        });

        // types work routes
        Route::prefix('types-work')->group(function () {
            Route::name('types-work.')->group(function () {
                Route::get('', [TypeWorkController::class, 'list'])->name('list');
                Route::post('', [TypeWorkController::class, 'store'])->name('store');
                Route::put('{typeWork}', [TypeWorkController::class, 'update'])->name('update');
                Route::delete('{typeWork}', [TypeWorkController::class, 'destroy'])->name('destroy');
            });
        });
    });
});
