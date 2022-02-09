<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;



class NameFilter
{

    public static function apply(Builder $query, Request $request)
    {
        if ($request->name) {
            $query->where('name', 'like', '%' .  $request->name . '%');
        }

        return $query;
    }
}
