<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VacancyApplicant extends Model
{
    use HasFactory;

    protected $table = 'vacancies_applicants';

    protected $fillable = [
        'applicant_id',
        'vacancy_id',
    ];

    /**
     * @return BelongsTo<Vacancy,VacancyApplicant>
     */
    public function vacancy(): BelongsTo
    {
        return $this->belongsTo(Vacancy::class);
    }
}
