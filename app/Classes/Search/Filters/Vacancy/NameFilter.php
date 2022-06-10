<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class NameFilter
{
    public static function apply(Builder $query, Request $request)
    {
        if ($request->name) {
            $query->where('name', 'ilike', '%' .  $request->name . '%');
        }

        return $query;
    }
}
