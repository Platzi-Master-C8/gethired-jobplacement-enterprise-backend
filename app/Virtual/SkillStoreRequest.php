<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Store Skill request",
 *      description="Store skill request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class SkillStoreRequest
{
    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of skill",
     *      example="JavaScript"
     * )
     *
     * @var string
     */
    public $name;
}
