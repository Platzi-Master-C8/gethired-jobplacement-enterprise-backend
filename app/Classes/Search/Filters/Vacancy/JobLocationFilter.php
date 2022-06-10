<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class JobLocationFilter
{
    public static function apply(Builder $query, Request $request)
    {
        if ($request->job_location) {
            $query->where('job_location', 'ilike', '%' .  $request->job_location . '%');
        }

        return $query;
    }
}
