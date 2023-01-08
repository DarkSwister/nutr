<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Registration
     *
     * @OA\Post(
     **     path="/api/register",
     *      operationId="register",
     *      tags={"Authentication"},
     *      summary="Register new user",
     *      description="Returns registered user token",
     *
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *       required={"name","email","password","confirm_password"},
     *       @OA\Property(property="email", type="string", format="email"),
     *       @OA\Property(property="password", type="string", format="password"),
     *       @OA\Property(property="confirm_password", type="string", format="password"),
     *      @OA\Property(property="name", type="string"),
     *   ),
     *  ),
     * ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *         content={
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 example={
     *                       "message": "User registered successfully.",
     *                       "statusCode": 200,
     *                       "data": {
     *                           "token": "1|ZitMwwnck9bk4uh8w73dO0CoHcUjrp78ilm7snhM",
     *                           "name": "Example"
     *                       }
     *                 }
     *             )
     *         )
     *      }
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function register(RegisterRequest $request)
    {

        $input = $request->validated();
        $input['password'] = bcrypt($input['password']);
        $input['user_type'] = 'user';
        $user = User::create($input);
        $success['token'] =  $user->createToken(config('app.name'))->plainTextToken;

        $success['name'] =  $user->name;

        return response()->json(["message"=>'User registered successfully.',"statusCode"=>200,"data"=>$success ]);
    }


    /**
     * Login
     * @OA\Post(
     ** path="/api/login",
     *   tags={"Authentication"},
     *   summary="Login",
     *   operationId="login",
     *
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *       required={"email","password"},
     *       @OA\Property(property="email", type="string", format="email"),
     *       @OA\Property(property="password", type="string", format="password"),
     *       ),
     *     ),
     * ),
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      content={
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 example={
     *                     "user_id": 1,
     *                     "token": "12|djl47d3yrihQsDjjkfKkMLx5TXsUyu98jkCF92N3"
     *                 }
     *             )
     *         )
     *      }
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="Not found"
     *   ),
     *   @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *   ),
     *   @OA\Response(
     *      response=422,
     *      description="Invalid data",
     *      content={
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 example={
     *                     "message": "The email must be a valid email address.",
     *                     "errors":{"email":{"The email must be a valid email address."}}
     *                 }
     *             )
     *         )
     *      }
     *   )
     *)
     **/

    public function login(LoginRequest $request)
    {
        if (!auth()->attempt($request->validated())) {
            return response(['message' => 'Invalid Credentials'], 401);
        }

        $accessToken = auth()->user()->createToken(config('app.name'))->plainTextToken;
        $response = ['user_id' => auth()->user()->id, 'token' => $accessToken];
        return response()->json($response, 200);
    }

    /**
     * Logout
     * @OA\Post(
     ** path="/api/logout",
     *   tags={"Authentication"},
     *   summary="Logout",
     *   operationId="logout",
     *   security={{"sanctum":{}}},
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     example={
     *                         "message": "You have been successfully logged out!"
     *                     }
     *                 )
     *             )
     *         }
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="Not found"
     *   ),
     *   @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *   )
     *)
     **/

    public function logout(Request $request)
    {
        $token = auth()->user()->tokens();
        $token->delete();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }

    public function test()
    {
        $response = ['message' => 'Response test message!'];
        return response($response, 200);
    }
}
