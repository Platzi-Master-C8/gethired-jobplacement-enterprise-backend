<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;



class SalaryRangeFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->min_salary && !$request->max_salary) {
            $query->where('salary', '<', $request->min_salary);
        }

        if (!$request->min_salary && $request->max_salary) {
            $query->where('salary', '>', $request->max_salary);
        }

        if ($request->min_salary && $request->max_salary) {
            $query->whereBetween('salary', [$request->min_salary, $request->max_salary]);
        }
        return $query;
    }
}
