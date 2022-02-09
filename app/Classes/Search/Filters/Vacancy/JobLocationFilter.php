<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;



class JobLocationFilter
{

    public static function apply(Builder $query, Request $request)
    {
        if ($request->job_location) {
            $query->where('job_location', 'like', '%' .  $request->job_location . '%');
        }

        return $query;
    }
}
