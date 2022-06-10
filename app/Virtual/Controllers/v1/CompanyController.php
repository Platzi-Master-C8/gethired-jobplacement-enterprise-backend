<?php

namespace App\Virtual\Controllers\v1;

abstract class CompanyController
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
    public function indexFindOne()
    {
    }

    /**
     * @OA\Get(
     *     tags={"Companies"},
     *     path="/api/v1/companies/{id}/show-with-vacancies",
     *     summary="Get company with vacancies",
     *     @OA\Parameter(
     *          name="id",
     *          description="Companyt id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Get company with vacancies"
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function showWithVacancies()
    {
    }

    /**
     * @OA\Post(
     *     tags={"Companies"},
     *     path="/api/v1/companies",
     *     summary="Store new company",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Company")
     *      ),
     *     @OA\Response(
     *         response=201,
     *         description="Store new company."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function store()
    {
    }

    /**
     * @OA\Patch(
     *     tags={"Companies"},
     *     path="/api/v1/companies/{id}",
     *     summary="Update data company",
     *     @OA\Parameter(
     *          name="id",
     *          description="Companyt id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Company")
     *      ),
     *     @OA\Response(
     *         response=201,
     *         description="update data company."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function update()
    {
    }
}
