<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;



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
