<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SalaryFilter
{
    public static function apply(Builder $query, Request $request)
    {
        if ($request->salary) {
            $query->where('salary', 'ilike', '%' .  $request->salary . '%');
        }

        return $query;
    }
}
