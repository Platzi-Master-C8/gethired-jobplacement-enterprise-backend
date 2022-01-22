<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyApplicant extends Model
{
    use HasFactory;

    protected $table = 'vacancies_applicants';

    protected $fillable = [
        'applicant_id',
        'vacancy_id',
        'aspiration_salary',
    ];
}
