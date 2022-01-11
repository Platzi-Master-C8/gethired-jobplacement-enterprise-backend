<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth0\SDK\API\Authentication;
use Auth0\SDK\API\Management;

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
        $auth = new Authentication(
            config('laravel-auth0.domain'),
            config('laravel-auth0.client_id'),
            config('laravel-auth0.client_secret'),
        );

        $oauthToken = $auth->oauth_token([
            'grant_type' => 'client_credentials',
            'audience' => config('laravel-auth0.audience'),
        ]);

        $auth0Api = new Management($oauthToken['access_token'], config('laravel-auth0.domain'));

        $users = $auth0Api->users()->getAll();

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
