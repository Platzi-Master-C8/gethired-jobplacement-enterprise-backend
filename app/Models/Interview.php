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
        'day',
        'hour',
        'platform',
        'url',
        'type',
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}
