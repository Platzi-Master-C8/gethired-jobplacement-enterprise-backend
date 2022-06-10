<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SkillsFilter
{
    public static function apply(Builder $query, Request $request)
    {
        if ($request->skills) {
            $query->where('skills', 'ilike', '%' .  $request->skills . '%');
        }

        return $query;
    }
}
