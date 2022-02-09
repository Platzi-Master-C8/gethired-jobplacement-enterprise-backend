<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;



class StatusFilter
{

    public static function apply(Builder $query, Request $request)
    {
        if ($request->status) {
            $query->where('status', $request->status);
        }

        return $query;
    }
}
