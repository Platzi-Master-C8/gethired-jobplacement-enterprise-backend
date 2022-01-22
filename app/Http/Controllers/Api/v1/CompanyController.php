<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function list()
    {
        return response()->json([
            'message' => 'List Company',
            'data' => Company::where('active', 1)->get(),
        ]);
    }

    public function listAsSelect()
    {
        return response()->json([
            'message' => 'List Company for select element',
            'data' => Company::select('id', 'name')->where('active', 1)->get(),
        ]);
    }

    public function listWithVacancies()
    {
        $companies = Company::where('active', 1)->with('vacancies')->get();

        return response()->json([
            'message' => 'List Company with yours vacancies',
            'data' => $companies,
        ]);
    }
}
