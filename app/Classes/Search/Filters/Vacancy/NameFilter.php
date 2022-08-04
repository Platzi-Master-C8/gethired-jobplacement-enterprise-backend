<?php

namespace App\Classes\Search\Filters\Vacancy;

use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class NameFilter
{
    /**
     * @param Builder<Vacancy> $query
     * @param Request $request
     * @return Builder<Vacancy>
     */
    public static function apply(Builder $query, Request $request): Builder
    {
        if ($request->name) {
            $query->where('name', 'ilike', '%' .  $request->name . '%');
        }

        return $query;
    }
}
