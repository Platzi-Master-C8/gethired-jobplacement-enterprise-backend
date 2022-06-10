<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TypeWorkFilter
{
    public static function apply(Builder $query, Request $request)
    {
        if ($request->typeWork) {
            $query->where('typeWork', 'ilike', '%' .  $request->typeWork . '%');
        }

        return $query;
    }
}
