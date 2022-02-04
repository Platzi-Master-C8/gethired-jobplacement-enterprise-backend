<?php

namespace Database\Seeders;

use App\Models\Applicant;
use App\Models\Company;
use App\Models\Vacancy;
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
        //\App\Models\User::factory(10)->create();

        Company::factory(6)->has(Vacancy::factory(5), 'vacancies')->create();
        Applicant::factory(50)->create();

        $vacancies = Vacancy::select('id')->get();
        $applicants = Applicant::select('id')->get();

        foreach ($vacancies as $vacancy) {
            $applicants->shuffle();
            $applicantsSelect = $applicants->take(5);

            foreach ($applicantsSelect as $item) {
                VacancyApplicant::factory()->create([
                    'applicant_id' => $item['id'],
                    'vacancy_id' => $vacancy['id'],
                ]);
            }
        }
    }
}
