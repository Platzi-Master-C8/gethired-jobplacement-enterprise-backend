<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;



class IdFilter
{

    public static function apply(Builder $query, Request $request)
    {
        if ($request->id) {
            $query->where('id', $request->id);
        }

        return $query;
    }
}
