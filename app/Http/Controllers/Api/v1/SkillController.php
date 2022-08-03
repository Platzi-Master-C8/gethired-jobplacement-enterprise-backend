<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillStoreRequest;
use App\Models\Skill;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class SkillController extends Controller
{
    public function list(): JsonResponse
    {
        $skills = $this->getSkills();

        return response()->json([
            'message' => 'Skill list',
            'count' => $skills->count(),
            'data' => $skills,
        ]);
    }

    public function store(SkillStoreRequest $request): JsonResponse
    {
        $skill = Skill::create($request->all());

        return response()->json([
            'message' => 'Skill created successfully!',
            'data' => $skill,
        ], 201);
    }

    /**
     * @return Collection<int, mixed>
     */
    protected function getSkills(): Collection
    {
        /** @var Collection $skills */
        $skills = Skill::get();

        return $skills->pluck('name');
    }
}
