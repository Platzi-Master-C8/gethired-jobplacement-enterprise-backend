<?php

namespace App\Http\Controllers\Api\v1;

use App\Classes\Search\SearchBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\Vacancy as VacancyRequest;
use App\Http\Resources\v1\VacancyCollection;
use App\Http\Resources\v1\VacancyResource;
use App\Models\Vacancy;
use App\Models\VacancyApplicant;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * @OA\Get(
     *      tags={"Vacancies"},
     *      path="/api/v1/vacancies",
     *      summary="Get list of Vacancies",
     *     @OA\Parameter(
     *          name="user_id",
     *          description="Get vacancies by user",
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Returns list of vacancies. If you need vacancies by user, please send user_id as paramete"
     *       ),
     *      @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function index(Request $request)
    {
        $vacancies = Vacancy::with("company")->with('typework');

        if ($request->user_id != '') {
            $vacancies->where('user_id', $request->user_id);
        }

        return new VacancyCollection($vacancies->get());
    }

    /**
     * @OA\Get(
     *      tags={"Vacancies"},
     *      path="/api/v1/vacancies/{id}",
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
     *          description="Show detail of a vacancy",
     *       ),
     *
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function indexFindOne(Vacancy $id)
    {
        return new VacancyResource($id);
    }

    /**
     * @OA\Post(
     *      tags={"Vacancies"},
     *      path="/api/v1/vacancies",
     *      summary="Store new vacancy",
     *      @OA\RequestBody(
     *          required=true,
     *           @OA\JsonContent(ref="#/components/schemas/Vacancy")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Store new vacancy.",
     *       ),
     *      @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function store(VacancyRequest $request)
    {
        $dataVacancies = Vacancy::create($request->all());

        return response()->json([
            'message' => 'Vacancy store successfully',
            'data' => $dataVacancies,
        ], 201);
    }

    /**
     * @OA\Put(
     *      tags={"Vacancies"},
     *      path="/api/v1/vacancies/{id}",
     *      summary="Update existing vacancy",
     *      description="Updated vacancy data",
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
     *           @OA\JsonContent(ref="#/components/schemas/Vacancy")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     * )
     */
    public function update(VacancyRequest $request, Vacancy $vacancy, $id)
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
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     * )
     */
    public function destroy($id)
    {
        VacancyApplicant::where("vacancy_id", $id)->delete();
        Vacancy::destroy($id);

        return response()->json([
            'message' => 'Success',
        ]);
    }

    /**
     * @OA\Patch(
     *     tags={"Vacancies"},
     *      path="/api/v1/vacancies-status-active/{id}",
     *      summary="Update status active vacancy",
     *      description="Updated status active vacancy data",
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
     *          response=200,
     *          description="Successful operation",
     *       ),
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
     *      tags={"Vacancies"},
     *      path="/api/v1/vacancies-status-inactive/{id}",
     *      summary="Update status false vacancy",
     *      description="Updated status false vacancy data",
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
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
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
     *      path="/api/v1/vacancies-actives",
     *      summary="Get list of active Vacancies",
     *      description="Returns list of active vacancies",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
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
     *      path="/api/v1/vacancies-inactives",
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
     *      tags={"Vacancies"},
     *      path="/api/v1/filter?{nameFilter}={value}",
     *      summary="Filter name field a vacancy",
     *      @OA\RequestBody(
     *          required=true,
     *           @OA\JsonContent(ref="#/components/schemas/Vacancy")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation.",
     *       ),
     *      @OA\Response(
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

        return response()->json(new VacancyCollection($query->get()));
    }

    /**
     * @OA\Get(
     *      tags={"Vacancies"},
     *      path="/api/v1/vacancies-job-location",
     *      summary="Get list of job location of Vacancies",
     *      @OA\Response(
     *          response=200,
     *          description="Returns list of job location of Vacancies"
     *       ),
     *      @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function vacanciesJobLocation()
    {
        return Vacancy::select("job_location")->distinct()->get();
    }
}
