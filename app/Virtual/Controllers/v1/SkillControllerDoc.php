<?php

namespace App\Virtual\Controllers\v1;

abstract class SkillControllerDoc
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
    public function store()
    {
    }
}
