<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\InterviewCollection;
use App\Http\Resources\v1\InterviewResource;
use App\Models\Interview;
use App\Models\InterviewHistory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"Interviews"},
     *     path="/api/v1/interviews",
     *     summary="Get interview list",
     *     @OA\Response(
     *         response=200,
     *         description="List interviews."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        $interviews = Interview::with('vacancy:id,name')->get();

        return response()->json([
            'count' => $interviews->count(),
            'data' => new InterviewCollection($interviews),
        ]);
    }

    /**
     * @OA\Post(
     *     tags={"Interviews"},
     *     path="/api/v1/interviews",
     *     summary="Store new interview",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Interview")
     *      ),
     *     @OA\Response(
     *         response=201,
     *         description="Store new interview."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function store(Request $request): JsonResponse
    {
        $interview = Interview::create($request->all());

        return response()->json([
            'message' => 'Interview store successfully!',
            'data' => $interview,
        ], 201);
    }

    /**
     * @OA\Get(
     *     tags={"Interviews"},
     *     path="/api/v1/interviews/{id}",
     *     summary="Get data of an interview",
     *     @OA\Parameter(
     *          name="id",
     *          description="Interview id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Show detail of an interview."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function show(Interview $interview): JsonResponse
    {
        return response()->json([
            'message' => 'Detail interview',
            'data' => new InterviewResource($interview),
        ]);
    }

    /**
     * @OA\Patch(
     *     tags={"Interviews"},
     *     path="/api/v1/interviews/{id}/reschedule",
     *     summary="Reschedule an interview",
     *     @OA\Parameter(
     *          name="id",
     *          description="Interview id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="new date",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property (
     *                  title="new Date",
     *                  description="new  Date interview",
     *                  example="2022-05-01 13:50:45",
     *                  format="datetimetz",
     *                  type="string",
     *                  property="new_date"
     *              )
     *          )
     *      ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Reschedule an interview giving new date in the body is necessary post new_date."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function reschedule(Request $request, Interview $interview): JsonResponse
    {
        /** @var string $newDate */
        $newDate = $request->new_date;
        InterviewHistory::create([
            'interview_id' => $interview->id,
            'description' => "Interview reschedule from {$interview->date} to {$newDate}",
        ]);

        $interview->date = $newDate;
        $interview->update();

        return response()->json([
            'message' => 'Interview reschedule',
        ]);
    }

    /**
     * @OA\Patch(
     *     tags={"Interviews"},
     *     path="/api/v1/interviews/{id}/cancel",
     *     summary="Cancel an interview",
     *     @OA\Parameter(
     *          name="id",
     *          description="Interview id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Cancel an interview."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function cancel(Request $request, Interview $interview): JsonResponse
    {
        InterviewHistory::create([
            'interview_id' => $interview->id,
            'description' => "Interview has canceled",
        ]);

        $interview->active = false;
        $interview->status_finished = 'Canceled';
        $interview->update();

        return response()->json([
            'message' => 'Interview canceled',
        ]);
    }

    /**
     * @OA\Patch(
     *     tags={"Interviews"},
     *     path="/api/v1/interviews/{id}/finish",
     *     summary="Finish an interview",
     *     @OA\Parameter(
     *          name="id",
     *          description="Interview id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Finish an interview."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function finish(Request $request, Interview $interview): JsonResponse
    {
        InterviewHistory::create([
            'interview_id' => $interview->id,
            'description' => "Interview has finished",
        ]);

        $interview->active = false;
        $interview->status_finished = 'Finished';
        $interview->update();

        return response()->json([
            'message' => 'Interview finished',
        ]);
    }
}
