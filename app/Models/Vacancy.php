<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
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
}
