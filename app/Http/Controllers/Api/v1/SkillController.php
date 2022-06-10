<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillStoreRequest;
use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"Skills"},
     *     path="/api/v1/skills",
     *     summary="Get skill list",
     *     @OA\Response(
     *         response=200,
     *         description="List skills."
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
            'message' => 'Skill list',
            'data' => $this->getSkills(),
        ]);
    }

    /**
     * @OA\Post(
     *     tags={"Skills"},
     *     path="/api/v1/skills",
     *     summary="Store new skill",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SkillStoreRequest")
     *      ),
     *     @OA\Response(
     *         response=201,
     *         description="Store new skill."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Validation."
     *     )
     * )
     */
    public function store(SkillStoreRequest $request)
    {
        $request->validated();

        $skill = Skill::create($request->all());

        return response()->json([
            'message' => 'Skill created successfully!',
            'data' => $skill,
        ], 201);
    }

    protected function getSkills()
    {
        return Skill::get()->pluck('name');
    }
}
