<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\CompanyResource;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyController extends Controller
{
    public function list(): JsonResponse
    {
        return response()->json([
            'message' => 'List Company',
            'data' => Company::where('active', 1)->get(),
        ]);
    }

    public function listAsSelect(): JsonResponse
    {
        return response()->json([
            'message' => 'List Company for select element',
            'data' => Company::select('id', 'name')->where('active', 1)->get(),
        ]);
    }

    public function listWithVacancies(): JsonResponse
    {
        $companies = Company::where('active', 1)->with('vacancies')->get();

        return response()->json([
            'message' => 'List Company with yours vacancies',
            'data' => $companies,
        ]);
    }

    public function indexFindOne(Company $company): JsonResource
    {
        return new CompanyResource($company);
    }

    // public function show(Company $company)
    // {
    //     return response()->json([
    //        'message' => 'Show company',
    //        'data' => $company
    //     ]);
    // }

    public function showWithVacancies(Company $company): JsonResponse
    {
        $vacancies = $company->vacancies;

        return response()->json([
            'message' => 'Show company with vacancies',
            'data' => $company,
            'vacancies' => $vacancies,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $company = Company::create($request->all());

        return response()->json([
            'message' => 'Company store successfully!',
            'data' => $company,
        ], 201);
    }

    public function update(Request $request, Company $company): JsonResponse
    {
        $company->update($request->all());

        return response()->json([
            'message' => 'Data company update successfully!',
            'data' => $company,
        ]);
    }
}
