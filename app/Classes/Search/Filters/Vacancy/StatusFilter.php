<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

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
