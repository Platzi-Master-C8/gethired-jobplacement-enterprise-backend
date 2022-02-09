<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;



class MinimumExperienceFilter
{

    public static function apply(Builder $query, Request $request)
    {
        if ($request->minimum_experience) {
            $query->where('minimum_experience', 'like', '%' .  $request->minimum_experience . '%');
        }

        return $query;
    }
}
