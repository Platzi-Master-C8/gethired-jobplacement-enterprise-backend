<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'email',
        'description',
        'address',
        'website',
        'country',
        'city',
        'active',
    ];

    /**
     * @return HasMany<Vacancy>
     */
    public function vacancies(): HasMany
    {
        return $this->hasMany(Vacancy::class, 'company_id', 'id');
    }
}
