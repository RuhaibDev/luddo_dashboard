<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{
    public function __construct(public UserService $userService){}

    /**
     * @throws \Throwable
     */
    public function create(StoreUserRequest $request): JsonResource
    {
        $filteredResponse = $request->validated();
        $response = $this->userService->createUser($filteredResponse);
        return new UserResource($response);
    }

    public function userLogin(UserLoginRequest $userLoginRequest)
    {
        $filteredResponse = $userLoginRequest->validated();
        $response = $this->userService->userLogin($filteredResponse['email']);
        return new UserResource($response);
    }
}
