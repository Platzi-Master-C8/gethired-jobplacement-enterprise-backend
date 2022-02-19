<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;



class PostulationDeadlineFilter
{

    public static function apply(Builder $query, Request $request)
    {
        if ($request->postulation_deadline) {
            $query->where('postulation_deadline', 'ilike', '%' .  $request->postulation_deadline . '%');
        }

        return $query;
    }
}
