<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\Request\UsersRequest;
use App\Services\Contracts\UserServiceInterface;
use App\Http\Controllers\Controller;

class LoginJwtController extends Controller
{
    private $userService;

    /**
     * LoginJwtController constructor.
     * @param UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param UsersRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(UsersRequest $request)
    {
        $return = $this->userService->login($request->all(['email', 'password']));
        return response()->json($return['data'], $return['code']);
    }
}
