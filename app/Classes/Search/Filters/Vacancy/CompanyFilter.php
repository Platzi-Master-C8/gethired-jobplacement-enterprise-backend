<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CompanyFilter
{
    public static function apply(Builder $query, Request $request)
    {
        if ($request->company) {
            $query->whereHas('company', function ($q) use ($request) {
                $q->whereIn('companies.id', $request->company);
            });
        }

        return $query;
    }
}
