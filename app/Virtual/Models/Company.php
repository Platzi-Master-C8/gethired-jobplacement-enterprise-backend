<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Company",
 *     description="Company model",
 *     @OA\Xml(
 *         name="Company"
 *     )
 * )
 */
class Company
{
    /**
     * @OA\Property(
     *      title="Name",
     *      description="name",
     *      example="company one"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="email company",
     *      description="email",
     *      example="email@platzi.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Resume company",
     *      example="Short description about company"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="address",
     *      description="Address company",
     *      example="Calle 89 # 78-85"
     * )
     *
     * @var string
     */
    public $address;

    /**
     * @OA\Property(
     *      title="Url website",
     *      description="Url website company",
     *      example="https://platzi.com"
     * )
     *
     * @var string
     */
    public $website;

    /**
     * @OA\Property(
     *      title="Country",
     *      description="Country where location",
     *      example="Colombia"
     * )
     *
     * @var string
     */
    public $country;

    /**
     * @OA\Property(
     *      title="City",
     *      description="City where location",
     *      example="Bogotá D.C"
     * )
     *
     * @var string
     */
    public $city;

    /**
     * @OA\Property(
     *      title="Active",
     *      description="Status company",
     *      format="boolean",
     *      example=1
     * )
     *
     * @var int
     */
    public $active;
}
