<?php

namespace App\Classes\Search\Filters\Vacancy;

use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HoursPerWeekFilter
{
    /**
     * @param Builder<Vacancy> $query
     * @param Request $request
     * @return Builder<Vacancy>
     */
    public static function apply(Builder $query, Request $request): Builder
    {
        if ($request->hours_per_week) {
            $query->where('hours_per_week', 'ilike', '%' .  $request->hours_per_week . '%');
        }

        return $query;
    }
}
