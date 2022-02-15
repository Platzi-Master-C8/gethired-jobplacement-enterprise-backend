<?php

namespace App\Virtual;

/**
 * @OA\Schema(
 *      title="Store Type Work request",
 *      description="Store type work request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class TypeWorkStoreRequest
{
    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of type work",
     *      example=""
     * )
     *
     * @var string
     */
    public $name;
}
