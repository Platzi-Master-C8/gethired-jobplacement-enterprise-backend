<?php

namespace App\Classes\Search\Filters\Vacancy;

use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IdFilter
{
    /**
     * @param Builder<Vacancy> $query
     * @param Request $request
     * @return Builder<Vacancy>
     */
    public static function apply(Builder $query, Request $request): Builder
    {
        if ($request->id) {
            $query->where('id', $request->id);
        }

        return $query;
    }
}
