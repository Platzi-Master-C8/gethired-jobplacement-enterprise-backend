<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Http\Resources\v1\CompanyResource;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"Companies"},
     *     path="/api/v1/companies",
     *     summary="Get company list",
     *     @OA\Response(
     *         response=200,
     *         description="List companies available."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function list()
    {
        return response()->json([
            'message' => 'List Company',
            'data' => Company::where('active', 1)->get(),
        ]);
    }

    /**
     * @OA\Get(
     *     tags={"Companies"},
     *     path="/api/v1/companies/select",
     *     summary="Get company list for a select",
     *     @OA\Response(
     *         response=200,
     *         description="If you need list companies available for a select, only fields (id, name)."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function listAsSelect()
    {
        return response()->json([
            'message' => 'List Company for select element',
            'data' => Company::select('id', 'name')->where('active', 1)->get(),
        ]);
    }

    /**
     * @OA\Get(
     *     tags={"Companies"},
     *     path="/api/v1/companies/vacancies",
     *     summary="Get company list with its vacancies",
     *     @OA\Response(
     *         response=200,
     *         description="List companies available with its vacancies."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function listWithVacancies()
    {
        $companies = Company::where('active', 1)->with('vacancies')->get();

        return response()->json([
            'message' => 'List Company with yours vacancies',
            'data' => $companies,
        ]);
    }

    /**
     * @OA\Get(
     *      tags={"Companies"},
     *      path="/api/v1/companies/{id}",
     *      summary="Get data of a Company",
     *       @OA\Parameter(
     *          name="id",
     *          description="Companyt id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Show detail of a company",
     *       ),
     *
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */

    public function indexFindOne(Company $id)
    {
        return new CompanyResource($id);
    }
}
