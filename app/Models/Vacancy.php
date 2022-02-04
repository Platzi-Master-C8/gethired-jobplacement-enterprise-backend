<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
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

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
