<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vacancy extends Model
{
    use HasFactory;

    protected $table = 'vacancies';

    protected $fillable = [
        'name',
        'user_id',
        'postulation_deadline',
        'description',
        'status',
        'salary',
        'company_id',
        'typeWork',
        'job_location',
        'skills',
        'hours_per_week',
        'minimum_experience',
    ];

    /**
     * @return BelongsTo<User,Vacancy>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo<Company,Vacancy>
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * @return BelongsTo<TypeWork,Vacancy>
     */
    public function typework(): BelongsTo
    {
        return $this->belongsTo(TypeWork::class, 'typeWork');
    }

    /**
     * @return HasMany<VacancyApplicant>
     */
    public function applicants(): HasMany
    {
        return $this->hasMany(VacancyApplicant::class);
    }
}
