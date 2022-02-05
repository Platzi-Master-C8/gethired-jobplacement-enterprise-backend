<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $table = 'interviews';

    protected $fillable = [
        'applicant_id',
        'vacancy_id',
        'date',
        'platform',
        'url',
        'type',
        'active',
        'status_finished',
        'notes',
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function histories()
    {
        return $this->hasMany(InterviewHistory::class);
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}
