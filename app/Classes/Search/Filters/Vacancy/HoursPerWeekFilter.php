<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;



class HoursPerWeekFilter
{

    public static function apply(Builder $query, Request $request)
    {
        if ($request->hours_per_week) {
            $query->where('hours_per_week', 'like', '%' .  $request->hours_per_week . '%');
        }

        return $query;
    }
}
