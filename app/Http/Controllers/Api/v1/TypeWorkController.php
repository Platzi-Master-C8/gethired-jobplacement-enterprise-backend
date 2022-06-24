<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeWorkStoreRequest;
use App\Models\TypeWork;
use Illuminate\Http\JsonResponse;

class TypeWorkController extends Controller
{
    public function list(): JsonResponse
    {
        return response()->json([
            'message' => 'Type work list',
            'data' => TypeWork::get(),
        ]);
    }

    public function store(TypeWorkStoreRequest $request): JsonResponse
    {
        $typeWork = TypeWork::create($request->all());

        return response()->json([
            'message' => 'Type work created successfully!',
            'data' => $typeWork,
        ], 201);
    }

    public function update(TypeWorkStoreRequest $request, TypeWork $typeWork): JsonResponse
    {
        $typeWork->update($request->all());

        return response()->json([
            'message' => 'Type work update successfully!',
            'data' => $typeWork,
        ]);
    }

    public function destroy(TypeWork $typeWork): JsonResponse
    {
        $typeWork->delete();

        return response()->json([
            'message' => 'Type work deleted successfully!',
        ]);
    }
}
