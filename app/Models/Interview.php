<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function histories()
    {
        return $this->hasMany(InterviewHistory::class);
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}
