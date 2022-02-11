<?php

namespace App\Http\Controllers\Api\v1;

use App\Classes\Search\SearchBuilder;
use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use App\Http\Requests\Vacancy as VacancyRequest;
use App\Http\Resources\v1\VacancyCollection;
use App\Http\Resources\v1\VacancyResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VacancyController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"Vacancies"},
     *     path="/api/v1/vacancies",
     *     operationId="getVacanciesList",
     *     summary="Get list of vacancies",
     *     description="Returns list of projects",
     *
     *      @OA\Response(
     *         response=200,
     *         description="Successful operation.",
     *         @OA\JsonContent(ref="#/components/schemas/VacancyResource")
     *     ),
     *
     *      @OA\Response(
     *          response=500,
     *          description="Error Server"
     *     ),
     * )
     */

    public function index()
    {
        return new VacancyCollection(Vacancy::with("company")->get());
    }

    /**
     * @OA\Get(
     *     tags={"Vacancies"},
     *     path="/api/v1/vacancies/{id}",
     *     operationId="getProjectById",
     *     summary=""Get a vacancy information"",
     *     @OA\Parameter(
     *          name="id",
     *          description="Vacancy id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation.",
     *         @OA\JsonContent(ref="#/components/schemas/Vacancy")
     *     ),
     * )
     */

    public function indexFindOne(Vacancy $id)
    {
        return new VacancyResource($id);
    }

    /**
     * @OA\Post(
     *     tags={"Vacancies"},
     *     path="/api/v1/vacancies",
     *     summary="Store a new vacancy",
     *     @OA\RequestBody(
     *
     *          required=true,
     *      ),
     *     @OA\Response(
     *         response=201,
     *         description="Save a new vacancy in the vacancies table and return a JSON with all data save."
     *     ),
     * * )
     */
    public function store(VacancyRequest $request)
    {
        $dataVacancies = Vacancy::create($request->all());
        return response()->json($dataVacancies, 201);
    }

    /**
     * @OA\Put(
     *     tags={"Vacancies"},
     *     path="/api/v1/vacancies/{id}",
     *     summary="Edit all fields of a vacancy",
     *     @OA\Response(
     *         response=200,
     *         description="through the id sent in the request obtains a vacancy specific"
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */


    public function update(Request $request, Vacancy $vacancy, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->update($request->all());
        return response()->json($vacancy);
    }

    // public function patch(Request $request, Vacancy $vacancy, $id)
    // {
    //     $vacancy = Vacancy::findOrFail($id);
    //     $vacancy->update($request->all());
    //     return response()->json($vacancy);
    // }

    /**
     * @OA\Delete(
     *     tags={"Vacancies"},
     *     path="/api/v1/vacancies/{id}",
     *     summary="Eliminate vacancy",
     *     @OA\Response(
     *         response=200,
     *         description="Eliminate a vacancy with ID assigned in the request"
     *     ),
     * )
     */

    public function destroy($id)
    {
        Vacancy::destroy($id);
        return response()->json([
            'message' => 'Success'
        ],);
    }

    /**
     * @OA\Patch(
     *     tags={"Vacancies"},
     *     path="/api/v1/vacancies-status-active/{id}",
     *     summary="Activate vacancy",
     *     @OA\Response(
     *         response=200,
     *         description="Change the value of the status to true of field STATUS in vacancies table ,and
     * response with the vacancy in JSON FORMAT"
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */

    public function patchActive(Request $request)
    {
        $vacancy_id = $request->id;
        $vacancy = Vacancy::findOrFail($vacancy_id);
        $vacancy->status = true;
        $vacancy->save();

        return response()->json($vacancy);
    }

    /**
     * @OA\Patch(
     *     tags={"Vacancies"},
     *     path="/api/v1/vacancies-status-inactive/{id}",
     *     summary="Inactivate vacancy",
     *     @OA\Response(
     *         response=200,
     *         description="Change the value of the status to false of field STATUS in vacancies table"
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */

    public function patchInactive(Request $request)
    {
        $vacancy_id = $request->id;
        $vacancy = Vacancy::findOrFail($vacancy_id);
        $vacancy->status = false;
        $vacancy->save();

        return response()->json($vacancy);
    }

    /**
     * @OA\Get(
     *     tags={"Vacancies"},
     *     path="/api/v1/vacancies-actives",
     *     summary="get all actives vacancies",
     *     @OA\Response(
     *         response=200,
     *         description="get a list with all actives vacancies"
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function vacanciesActives()
    {
        return new VacancyCollection(Vacancy::where('status', 1)->OrderBy('updated_at', 'desc')->get());
    }

    /**
     * @OA\Get(
     *     tags={"Vacancies"},
     *     path="/api/v1/vacancies-inactives",
     *     summary="get all inactives vacancies",
     *     @OA\Response(
     *         response=200,
     *         description="get a list with all inactives vacancies"
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */

    public function vacanciesInactives()
    {
        return new VacancyCollection(Vacancy::where('status', 0)->OrderBy('updated_at', 'desc')->get());
    }

    /**
     * @OA\Post(
     *     tags={"Vacancies"},
     *     path="/api/v1/filter?{nameFilter}={value}",
     *     summary="Get vacancies or vacancies through filters",
     *     @OA\Response(
     *         response=200,
     *         description=""
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function filter(Request $request)
    {

        //Build research motor
        $builder = new SearchBuilder('Vacancy', $request);
        //Applicate filter
        $query = $builder->filter();
        //return json query
        $query = $builder->filter();
        return response()->json($query->get());
    }
}
