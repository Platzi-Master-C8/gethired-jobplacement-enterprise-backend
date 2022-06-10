<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         version="1.0.0",
 *         title="API GetHired Enterprise",
 *         description="Documentation of Get Hired Enterprise Backend.",
 *     ),
 *     @OA\Server(
 *         description="Get Hired Enterprise Backend",
 *         url=L5_SWAGGER_CONST_HOST
 *     ),
 *     @OA\Tag(
 *         name="Vacancies",
 *         description="API Endpoints of vacancies"
 *     ),
 *     @OA\Tag(
 *         name="Interviews",
 *         description="API Endpoints of interviews"
 *     ),
 *     @OA\Tag(
 *         name="Companies",
 *         description="API Endpoints of companies"
 *     ),
 *     @OA\Tag(
 *         name="Skills",
 *         description="API Endpoints of skills"
 *     ),
 *     @OA\Tag(
 *         name="TypesWork",
 *         description="API Endpoints of types work"
 *     ),
 *     @OA\Tag(
 *         name="Users",
 *         description="API Endpoints of Users"
 *     ),
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;
}
