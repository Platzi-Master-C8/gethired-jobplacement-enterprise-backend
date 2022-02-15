<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeWorkStoreRequest;
use App\Models\TypeWork;
use Illuminate\Http\Request;

class TypeWorkController extends Controller
{
    /**
     * @OA\Get(
     *     tags={"TypesWork"},
     *     path="/api/v1/types-work",
     *     summary="Get types work list",
     *     @OA\Response(
     *         response=200,
     *         description="List types work."
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
            'message' => 'Type work list',
            'data' => TypeWork::get(),
        ]);
    }

    /**
     * @OA\Post(
     *     tags={"TypesWork"},
     *     path="/api/v1/types-work",
     *     summary="Store new type work",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/TypeWorkStoreRequest")
     *      ),
     *     @OA\Response(
     *         response=201,
     *         description="Store new type work."
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
    public function store(TypeWorkStoreRequest $request)
    {
        $request->validated();

        $typeWork = TypeWork::create($request->all());

        return response()->json([
            'message' => 'Type work created successfully!',
            'data' => $typeWork,
        ], 201);
    }

    /**
     * @OA\Put(
     *     tags={"TypesWork"},
     *     path="/api/v1/types-work/{id}",
     *     summary="Update type work",
     *     @OA\Parameter(
     *          name="id",
     *          description="Type work id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/TypeWorkStoreRequest")
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Update type work."
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
    public function update(TypeWorkStoreRequest $request, TypeWork $typeWork)
    {
        $request->validated();

        $typeWork->update($request->all());

        return response()->json([
            'message' => 'Type work update successfully!',
            'data' => $typeWork,
        ]);
    }

    /**
     * @OA\Delete(
     *     tags={"TypesWork"},
     *     path="/api/v1/types-work/{id}",
     *     summary="Delete type work",
     *     @OA\Parameter(
     *          name="id",
     *          description="Type work id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *         response=200,
     *         description="Delete type work."
     *     ),
     *      @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     ),
     * )
     */
    public function destroy(TypeWork $typeWork)
    {
        $typeWork->delete();
        
        return response()->json([
            'message' => 'Type work deleted successfully!',
        ]);
    }
}
