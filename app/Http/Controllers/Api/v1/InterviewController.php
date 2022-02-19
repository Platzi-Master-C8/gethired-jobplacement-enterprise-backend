<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Interview;
use App\Models\InterviewHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function index()
    {
        $interviews = Interview::get();

        return response()->json([
            'count' => $interviews->count(),
            'data' => $interviews,
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
    public function store(Request $request)
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
    public function show(Interview $interview)
    {
        return response()->json([
            'message' => 'Detail interview',
            'data' => $interview,
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
     *     @OA\Response(
     *         response=200,
     *         description="Reschedule an interview giving new date in the body is necessary post new_data."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function reschedule(Request $request, Interview $interview)
    {
        InterviewHistory::create([
            'interview_id' => $interview->id,
            'description' => "Interview reschedule from {$interview->date} to {$request->new_date}"
        ]);

        $interview->date = $request->new_date;
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
    public function cancel(Request $request, Interview $interview)
    {
        InterviewHistory::create([
            'interview_id' => $interview->id,
            'description' => "Interview has canceled"
        ]);

        $interview->active = 0;
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
    public function finish(Request $request, Interview $interview)
    {
        InterviewHistory::create([
            'interview_id' => $interview->id,
            'description' => "Interview has finished"
        ]);

        $interview->active = 0;
        $interview->status_finished = 'Finished';
        $interview->update();

        return response()->json([
            'message' => 'Interview finished',
        ]);
    }
}
