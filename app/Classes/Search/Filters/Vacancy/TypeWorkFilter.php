<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;



class TypeWorkFilter
{

    public static function apply(Builder $query, Request $request)
    {
        if ($request->typeWork) {
            $query->where('typeWork', 'like', '%' .  $request->typeWork . '%');
        }

        return $query;
    }
}
