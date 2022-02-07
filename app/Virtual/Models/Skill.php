<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Skill",
 *     description="Skill model",
 *     @OA\Xml(
 *         name="Skill"
 *     )
 * )
 */
class Skill
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
