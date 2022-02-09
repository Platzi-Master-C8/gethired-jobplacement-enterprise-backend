<?php

namespace App\Classes\Search\Filters\Vacancy;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;



class UserFilter
{

    public static function apply(Builder $query, Request $request)
    {
        if ($request->user) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->whereIn('users.id', $request->user);
            });
        }

        return $query;
    }
}
