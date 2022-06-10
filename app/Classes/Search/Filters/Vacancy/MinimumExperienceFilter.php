<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MinimumExperienceFilter
{
    public static function apply(Builder $query, Request $request)
    {
        if ($request->minimum_experience) {
            $query->where('minimum_experience', 'ilike', '%' .  $request->minimum_experience . '%');
        }

        return $query;
    }
}
