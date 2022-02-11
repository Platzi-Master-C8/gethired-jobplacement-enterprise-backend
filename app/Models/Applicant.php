<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Applicant extends Model
{
    use HasFactory;

    protected $table = 'applicants';

    protected $fillable = [
        'name',
        'email',
        'portfolio',
        'link_portfolio',
        'years_experience',
    ];

    public function vacancies_applicants(): HasMany
    {
        return $this->hasMany(VacancyApplicant::class);
    }
}
