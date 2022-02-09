<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;



class SalaryFilter
{

    public static function apply(Builder $query, Request $request)
    {
        if ($request->salary) {
            $query->where('salary', 'like', '%' .  $request->salary . '%');
        }

        return $query;
    }
}
