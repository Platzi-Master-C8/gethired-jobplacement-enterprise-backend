<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Vacancy",
 *     description="Vacancy model",
 *     @OA\Xml(
 *         name="Vacancy"
 *     )
 * )
 */
class Vacancy
{

    /**
     * @OA\Property(
     *      title="Name",
     *      description="name",
     *      example="Frontend Developer"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="User_id",
     *      description="user_id",
     *      example="uuid of auth0"
     * )
     *
     * @var string
     */
    public $user_id;

    /**
     * @OA\Property(
     *     title="Postulation Deadline",
     *     description="Date Deadline Postulation",
     *     example="2022-05-01 13:50:45",
     *     format="datetimetz",
     *     type="string"
     * )
     *
     * @var \DateTimeZone
     */
    public $postulation_deadline;



    /**
     * @OA\Property(
     *      title="Description",
     *      description="Description vacancy",
     *      example="Details contract."
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="Status",
     *      description="Status vacancy",
     *      format="boolean",
     *      example=1
     * )
     *
     * @var integer
     */
    public $status;

    /**
     * @OA\Property(
     *      title="Salary",
     *      description="Salary proposal",
     *      format="int64",
     *      example=1500
     * )
     *
     * @var integer
     */
    public $salary;


    /**
     * @OA\Property(
     *      title="Company id",
     *      description="Company publish vacancy",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $company_id;

    /**
     * @OA\Property(
     *      title="TypeWork",
     *      description="Type work of vacancy",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $typeWork;


    /**
     * @OA\Property(
     *      title="Job location",
     *      description="Location of the company",
     *      example="cra 23 # 11 -62 Bucaramanga Santander"
     * )
     *
     * @var string
     */
    public $job_location;

    /**
     * @OA\Property(
     *      title="Skills",
     *      description="Select your skills",
     *      example="React, Php, Node, Angular"
     * )
     *
     * @var string
     */
    public $skills;



    /**
     * @OA\Property(
     *      title="Hours per week",
     *      description="hours worked during the week",
     *      example="48"
     * )
     *
     * @var integer
     */
    public $hours_per_week;

    /**
     * @OA\Property(
     *      title="Minimun experience",
     *      description="years of experience in this role",
     *      example="5"
     * )
     *
     * @var integer
     */
    public $minimum_experience;
}
