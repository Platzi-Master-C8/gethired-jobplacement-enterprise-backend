<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Interview extends Model
{
    use HasFactory;

    protected $table = 'interviews';

    protected $fillable = [
        'user_id',
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

    /**
     * @return HasMany<InterviewHistory>
     */
    public function histories(): HasMany
    {
        return $this->hasMany(InterviewHistory::class);
    }

    /**
     * @return BelongsTo<Vacancy>
     */
    public function vacancy(): BelongsTo
    {
        return $this->belongsTo(Vacancy::class);
    }
}
