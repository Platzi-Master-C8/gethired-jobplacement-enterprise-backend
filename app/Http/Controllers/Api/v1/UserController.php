<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Auth0\SDK\Auth0;
use Auth0\SDK\Configuration\SdkConfiguration;
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
     */
    public function index()
    {
        $configuration = new SdkConfiguration(
            domain: config('auth0.domain'),
            clientId: config('auth0.clientId'),
            clientSecret: config('auth0.clientSecret'),
            audience: [
                config('auth0.audience'),
            ],
            scope: ['client_credentials']
        );

        $auth0Api = new Auth0($configuration);
        $users = json_decode($auth0Api->management()->users()->getAll()->getBody());

        return response()->json([
            'message' => 'User list',
            'count' => count($users),
            'data' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
