<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Auth0\SDK\Auth0;
use Auth0\SDK\Configuration\SdkConfiguration;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *     tags={"Users"},
     *     path="/api/v1/users",
     *     summary="Show users",
     *     @OA\Response(
     *         response=200,
     *         description="Show users from Auth0."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     *
     * @throws \Auth0\SDK\Exception\ConfigurationException
     */
    public function index(): JsonResponse
    {
        /** @var string $domain */
        $domain = config('auth0.domain');
        /** @var string $clientId */
        $clientId = config('auth0.clientId');
        /** @var string $clientSecret */
        $clientSecret = config('auth0.clientSecret');
        /** @var string $audience */
        $audience = config('laravel-auth0.audience');
        $configuration = new SdkConfiguration(
            domain: $domain,
            clientId: $clientId,
            clientSecret: $clientSecret,
            audience: [
                $audience,
            ],
            scope: ['client_credentials']
        );

        $auth0Api = new Auth0($configuration);
        /** @var array $users */
        $users = json_decode($auth0Api->management()->users()->getAll()->getBody());

        return response()->json([
            'message' => 'User list',
            'count' => count($users),
            'data' => $users,
        ]);
    }
}
