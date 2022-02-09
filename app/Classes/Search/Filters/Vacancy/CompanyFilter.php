<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;



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
