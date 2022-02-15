<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="TypeWork",
 *     description="Type work model",
 *     @OA\Xml(
 *         name="TypeWork"
 *     )
 * )
 */
class TypeWork
{
    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of type work",
     *      example="JavaScript"
     * )
     *
     * @var string
     */
    public $name;
}
