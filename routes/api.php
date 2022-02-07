<?php

use App\Http\Controllers\Api\v1\InterviewController;
use App\Http\Controllers\Api\v1\SkillController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\VacancyController;
use App\Http\Controllers\Api\v1\CompanyController;

use App\Http\Controllers\Api\v1\ApplicationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
//Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
//    return $request->user();
//});

Route::get('v1/users', [UserController::class, 'index'])->name('users.index');

Route::get('check-auth0', function () {
    return response()->json([
        'message' => 'Secure Zone by token auth0',
    ]);
})->middleware('jwt.auth0');

Route::get('/v1/vacancies', [VacancyController::class, 'index'])->name('vacancies.index');
Route::get('/v1/vacancies/{id}', [VacancyController::class, 'indexFindOne'])->name('vacancies.indexFindOne');


Route::post('/v1/vacancies', [VacancyController::class, 'store'])->name('vacancies.store');
Route::put('/v1/vacancies/{id}', [VacancyController::class, 'update'])->name('vacancies.update');
Route::delete('/v1/vacancies/{id}', [VacancyController::class, 'destroy'])->name('vacancies.destroy');
Route::patch('/v1/vacancies/{id}', [VacancyController::class, 'patch'])->name('vancancies.patch');
Route::get('v1/vacancies/{id}/applications', [ApplicationController::class, 'listApplicants'])->name('vacancies.applications.list');
Route::post('v1/vacancies/{id}/applications', [ApplicationController::class, 'applyVacancy'])->name('vacancies.applications.apply');

Route::patch('v1/vacancies-status-active/{id}', [VacancyController::class, 'patchActive'])->name('status.active.patch');
Route::patch('v1/vacancies-status-inactive/{id}', [VacancyController::class, 'patchInactive'])->name('status.inactive.patch');
Route::get('v1/vacancies-actives', [VacancyController::class, 'vacanciesActives'])->name('vacancies.allActives');
Route::get('v1/vacancies-inactives', [VacancyController::class, 'vacanciesInactives'])->name('vacancies.allInactives');

Route::prefix('v1')->group(function () {
    Route::name('v1.')->group(function () {
        // interview routes
        Route::prefix('interviews')->group(function () {
            Route::name('interviews.')->group(function () {
                Route::get('', [InterviewController::class, 'index'])->name('index');
                Route::post('', [InterviewController::class, 'store'])->name('store');

                Route::get('{id}', [InterviewController::class, 'show'])->name('show');
                Route::patch('{id}/reschedule', [InterviewController::class, 'reschedule'])->name('reschedule');
                Route::patch('{id}/cancel', [InterviewController::class, 'cancel'])->name('cancel');
                Route::patch('{id}/finish', [InterviewController::class, 'finish'])->name('finish');
            });
        });

        // company routes
        Route::prefix('companies')->group(function () {
            Route::name('companies.')->group(function () {
                Route::get('', [CompanyController::class, 'list'])->name('list');
                Route::get('select', [CompanyController::class, 'listAsSelect'])->name('list-select');
                Route::get('vacancies', [CompanyController::class, 'listWithVacancies'])->name('list-with-vacancies');
            });
        });

        // skill routes
        Route::prefix('skills')->group(function () {
            Route::name('skills.')->group(function () {
                Route::get('', [SkillController::class, 'list'])->name('list');
                Route::post('', [SkillController::class, 'store'])->name('store');
            });
        });
    });
});
