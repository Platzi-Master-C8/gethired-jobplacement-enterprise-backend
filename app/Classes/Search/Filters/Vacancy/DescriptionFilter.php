<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DescriptionFilter
{
    public static function apply(Builder $query, Request $request)
    {
        if ($request->description) {
            $query->where('description', 'ilike', '%' .  $request->description . '%');
        }

        return $query;
    }
}
