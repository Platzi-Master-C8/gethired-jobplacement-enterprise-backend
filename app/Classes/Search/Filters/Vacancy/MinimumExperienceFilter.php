<?php

namespace App\Classes\Search\Filters\Vacancy;

use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MinimumExperienceFilter
{
    /**
     * @param Builder<Vacancy> $query
     * @param Request $request
     * @return Builder<Vacancy>
     */
    public static function apply(Builder $query, Request $request): Builder
    {
        if ($request->minimum_experience) {
            $query->where('minimum_experience', 'ilike', '%' .  $request->minimum_experience . '%');
        }

        return $query;
    }
}
