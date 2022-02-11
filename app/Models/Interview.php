<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Interview extends Model
{
    use HasFactory;

    protected $table = 'interviews';

    protected $fillable = [
        'user_id',
        'company_id',
        'applicant_id',
        'vacancy_id',
        'platform',
        'url',
        'type',
        'active',
        'status_finished',
        'notes',
        'date',
    ];

    // public function applicant()
    // {
    //     return $this->belongsTo(Applicant::class);
    // }

    // public function histories()
    // {
    //     return $this->hasMany(InterviewHistory::class);
    // }

    // public function vacancy()
    // {
    //     return $this->belongsTo(Vacancy::class);
    // }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function vacancy_applicant(): BelongsTo
    {
        return $this->belongsTo(VacancyApplicant::class);
    }
}
