<?php

namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Services\RegisterService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    private $service;

    public function __construct(RegisterService $service)
    {
        $this->service = $service;
    }

    /**
     * Register
     * @param LoginRequest $request
     */
    public function login(LoginRequest $request)
    {
        try {
            if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
                $user = Auth::user();
                $success = $user;
                $success['token'] = $user->createToken('auth_token')->plainTextToken;

                return $this->handleResponse($success, 'User logged-in!');
            } else{
                return $this->handleError('Unauthorised.', Response::HTTP_UNAUTHORIZED);
            }
        } catch (\Throwable $th) {
            return $this->handleError($th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Register
     * @param RegisterRequest $request
     */
    public function register(RegisterRequest $request)
    {
        try {
            $user = $this->service->register($request);
            $token = $user->createToken('auth_token')->plainTextToken;

            $success = $user;
            $success['token'] = $token;

            return $this->handleResponse($success, 'User successfully registered!');
        } catch (\Throwable $th) {
            return $this->handleError($th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
