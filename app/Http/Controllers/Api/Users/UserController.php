<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Requests\Request\UsersRequest;
use App\Services\Contracts\UserServiceInterface;
use App\Http\Controllers\Controller;


class UserController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $return = $this->userService->list_all_users();
        return response()->json($return['data'], $return['code']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UsersRequest $request)
    {
        $return = $this->userService->create_user($request->all(['name', 'password', 'email']));
        return response()->json($return['data'], $return['code'],['id'=>$return['id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $return = $this->userService->list_user_by_id($id);
        return response()->json($return['data'], $return['code']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UsersRequest $request, $id)
    {
        $return = $this->userService->update_user_by_id($request->all(['name', 'password', 'email']), $id);
        return response()->json($return['data'], $return['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $return = $this->userService->delete_user($id);
        return response()->json($return['data'], $return['code']);
    }
}
