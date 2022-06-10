<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HoursPerWeekFilter
{
    public static function apply(Builder $query, Request $request)
    {
        if ($request->hours_per_week) {
            $query->where('hours_per_week', 'ilike', '%' .  $request->hours_per_week . '%');
        }

        return $query;
    }
}
