<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;



class SkillsFilter
{

    public static function apply(Builder $query, Request $request)
    {
        if ($request->skills) {
            $query->where('skills', 'like', '%' .  $request->skills . '%');
        }

        return $query;
    }
}
