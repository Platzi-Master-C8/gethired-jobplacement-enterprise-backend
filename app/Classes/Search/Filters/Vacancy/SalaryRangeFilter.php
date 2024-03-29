<?php

namespace App\Classes\Search\Filters\Vacancy;

use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SalaryRangeFilter
{
    /**
     * @param Builder<Vacancy> $query
     * @param Request $request
     * @return Builder<Vacancy>
     */
    public static function apply(Builder $query, Request $request): Builder
    {
        if ($request->min_salary && ! $request->max_salary) {
            $query->where('salary', '<', $request->min_salary);
        }

        if (! $request->min_salary && $request->max_salary) {
            $query->where('salary', '>', $request->max_salary);
        }

        if ($request->min_salary && $request->max_salary) {
            $query->whereBetween('salary', [$request->min_salary, $request->max_salary]);
        }

        return $query;
    }
}
