<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Interview;
use App\Models\Skill;
use App\Models\Vacancy;
use App\Models\User;
use App\Models\VacancyApplicant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Company::factory(3)->has(Vacancy::factory(5), 'vacancies')->create();




        // ->has(User::factory(3), 'users')
        //     ->has(Vacancy::factory(10), 'vacancies')->create();
        // Applicant::factory(26)->Vac
        // Applicant::factory(20)->has(VacancyApplicant::factory(3), 'vacancies_applicants')->create();
        // Company::factory(2)->has(User::factory(3), 'users')->has(Interview::factory(10), 'interviews')->create();
        // Applicant::factory(50)->create();

        // $vacancies = Vacancy::select('id')->get();
        // $applicants = Applicant::select('id')->get();

        // foreach ($vacancies as $vacancy) {
        //     $applicants->shuffle();
        //     $applicantsSelect = $applicants->take(5);

        //     foreach ($applicantsSelect as $item) {
        //         VacancyApplicant::factory()->create([
        //             'applicant_id' => $item['id'],
        //             'vacancy_id' => $vacancy['id'],
        //         ]);
        //     }
        // }
    }
}
