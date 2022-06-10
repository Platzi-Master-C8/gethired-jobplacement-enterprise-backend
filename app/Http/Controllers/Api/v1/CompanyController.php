<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\CompanyResource;
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

    public function indexFindOne(Company $id)
    {
        return new CompanyResource($id);
    }

    // public function show(Company $company)
    // {
    //     return response()->json([
    //        'message' => 'Show company',
    //        'data' => $company
    //     ]);
    // }

    public function showWithVacancies(Company $company)
    {
        $vacancies = $company->vacancies;

        return response()->json([
            'message' => 'Show company with vacancies',
            'data' => $company,
            'vacancies' => $vacancies,
        ]);
    }

    public function store(Request $request)
    {
        $company = Company::create($request->all());

        return response()->json([
            'message' => 'Company store successfully!',
            'data' => $company,
        ], 201);
    }

    public function update(Request $request, Company $company)
    {
        $company->update($request->all());

        return response()->json([
            'message' => 'Data company update successfully!',
            'data' => $company,
        ]);
    }
}
