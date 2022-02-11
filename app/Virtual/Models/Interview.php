<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Interview",
 *     description="Interview model",
 *     @OA\Xml(
 *         name="Interview"
 *     )
 * )
 */
class Interview
{
    /**
     * @OA\Property(
     *     title="Date",
     *     description="Date interview",
     *     example="2022-05-01 13:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    public $date;

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
     *      title="Vacancy id",
     *      description="Id of vacancy",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $vacancy_id;

    /**
     * @OA\Property(
     *      title="Applicant id",
     *      description="Id of applicant",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $applicant_id;

    /**
     * @OA\Property(
     *      title="platform",
     *      description="Platform will be the interview",
     *      example="Zoom, precencial"
     * )
     *
     * @var string
     */
    public $platform;

    /**
     * @OA\Property(
     *      title="Url",
     *      description="Url interview if the case",
     *      example="https://zoom.com"
     * )
     *
     * @var string
     */
    public $url;

    /**
     * @OA\Property(
     *      title="Type",
     *      description="",
     *      example=""
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *      title="Active",
     *      description="Status vacancy",
     *      format="boolean",
     *      example=1
     * )
     *
     * @var integer
     */
    public $active;

    /**
     * @OA\Property(
     *      title="Status finished",
     *      description="Reason of finished interview",
     *      example="Cancel or Finished"
     * )
     *
     * @var string
     */
    public $status_finished;

    /**
     * @OA\Property(
     *      title="Notes",
     *      description="Optional Notes",
     *      example=""
     * )
     *
     * @var string
     */
    public $notes;
}
