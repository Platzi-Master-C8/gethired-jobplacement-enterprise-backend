<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use App\Models\VacancyApplicant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function listApplicants(Vacancy $vacancy): JsonResponse
    {
        $applicants = $vacancy->applicants;

        return response()->json([
            'message' => 'List applicants',
            'count' => count($applicants),
            'data' => $applicants->pluck('applicant_id'),
        ]);
    }

    public function applyVacancy(Request $request, Vacancy $vacancy): JsonResponse
    {
        try {
            VacancyApplicant::create([
                'vacancy_id' => $vacancy->id,
                'applicant_id' => $request->applicant_id,
            ]);

            return response()->json([
                'message' => 'Application successful!',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
            ]);
        }
    }
}
