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
     *      tags={"Vacancies"},
     *      path="/api/v1/vacancies",
     *      operationId="getVacanciesList",
     *      summary="Get list of Vacancies",
     *      description="Returns list of vacancies",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */

    public function index()
    {
        return new VacancyCollection(Vacancy::with("company")->get());
    }

    /**
     * @OA\Get(
     *      tags={"Vacancies"},
     *      path="/api/v1/vacancies/{id}",
     *      operationId="getVacancy",
     *      summary="Get data of a Vacancy ",
     *       @OA\Parameter(
     *          name="id",
     *          description="Vacancy id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */



    public function indexFindOne(Vacancy $id)
    {
        return new VacancyResource($id);
    }

    /**
     * @OA\Post(
     *      path="/v1/vacancies",
     *      operationId="storeVacancy",
     *      tags={"Vacancies"},
     *      summary="Store new vacancy",
     *      description="Returns vacancy data",
     *      @OA\RequestBody(
     *          required=true,
     *
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *       ),
     * )
     */

    public function store(VacancyRequest $request)
    {
        $dataVacancies = Vacancy::create($request->all());
        return response()->json($dataVacancies, 201);
    }

    /**
     * @OA\Put(
     *      path="/api/v1/vacancies/{id}",
     *      operationId="updateVacancy",
     *      tags={"Vacancies"},
     *      summary="Update existing vacancy",
     *      description="Returns updated vacancy data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Vacancy id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */

    public function update(Request $request, Vacancy $vacancy, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->update($request->all());
        return response()->json($vacancy);
    }

    /**
     * @OA\Delete(
     *      path="/api/v1/vacancies/{id}",
     *      operationId="deleteVacancy",
     *      tags={"Vacancies"},
     *      summary="Delete existing vacancy",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Vacancy id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
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
     *      path="/v1/vacancies-status-active/{id}",
     *      operationId="updateVacancy",
     *      tags={"Vacancies"},
     *      summary="Update status active vacancy",
     *      description="Returns updated status active vacancy data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Vacancy id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
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
     *      path="v1/vacancies-status-inactive/{id}",
     *      operationId="updateVacancy",
     *      tags={"Vacancies"},
     *      summary="Update status false vacancy",
     *      description="Returns updated status false vacancy data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Vacancy id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
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
     *      tags={"Vacancies"},
     *      path="v1/vacancies-actives",
     *      operationId="getVacanciesList",
     *      summary="Get list of active Vacancies",
     *      description="Returns list of active vacancies",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */


    public function vacanciesActives()
    {
        return new VacancyCollection(Vacancy::where('status', 1)->OrderBy('updated_at', 'desc')->get());
    }

    /**
     * @OA\Get(
     *      tags={"Vacancies"},
     *      path="vv1/vacancies-inactives",
     *      operationId="getVacanciesList",
     *      summary="Get list of inactive Vacancies",
     *      description="Returns list of inactive vacancies",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */


    public function vacanciesInactives()
    {
        return new VacancyCollection(Vacancy::where('status', 0)->OrderBy('updated_at', 'desc')->get());
    }

    /**
     * @OA\Post(
     *      path="/api/v1/filter?{nameFilter}={value}",
     *      operationId="filterVacancy",
     *      tags={"Vacancies"},
     *      summary="Filter name field a vacancy",
     *      description="Returns vacancy data",
     *      @OA\RequestBody(
     *          required=true,
     *
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *
     *       ),
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
