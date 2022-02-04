<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\Api\v1\VacancyController;
use App\Http\Controllers\Api\v1\CompanyController;
use App\Http\Requests\Vacancy;

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
Route::patch('/v1/Vacancies/{id}', [VacancyController::class, 'patch'])->name('vancancies.patch');

Route::get('v1/companies', [CompanyController::class, 'list'])->name('companies.list');
Route::get('v1/companies/select', [CompanyController::class, 'listAsSelect'])->name('companies.list-select');
Route::get('v1/companies/vacancies', [CompanyController::class, 'listWithVacancies'])->name('companies.list-with-vacancies');
