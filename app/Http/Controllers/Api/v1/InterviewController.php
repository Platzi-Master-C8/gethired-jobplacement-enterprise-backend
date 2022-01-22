<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Interview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InterviewController extends Controller
{
    public function index()
    {
        $interviews = Interview::get();

        return response()->json([
            'count' => $interviews->count(),
            'data'=> $interviews,
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
