<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $credentials
     * @return array
     */
    public function login($credentials)
    {
        try {
            if (!$token = auth('api')->attempt($credentials)) {
                return [
                    'data' => ['error' => 'Username or password is invalid'],
                    'code' => 401
                ];
            }

            $user = $this->userRepository->findByEmail($credentials['email']);
            return [
                'data' => [
                    'user' => $user['name'],
                    'token' => $token
                ],
                'code' => 200
            ];
        } catch (\Exception $e) {
            return [
                'data' => [
                    'error' => $e->getMessage(),
                ],
                'code' => 500
            ];
        }
    }

    /**
     * @param $params
     * @return array
     */
    public function create_user($params)
    {
        try {
            if ($this->userRepository->findByEmail($params['email'])) {
                return [
                    'data' => ['error' => 'User is already registered'],
                    'code' => 409
                ];
            }

            if ($id = $this->userRepository->create([
                'name' => $params['name'],
                'email' => $params['email'],
                'password' => Hash::make($params['password']),
            ])) {
                return [
                    'data' => [
                        'status' => 'OK',
                        'Message' => 'Registered successfully'
                    ],
                    'code' => 201,
                    'id'=>$id
                ];
            }
        } catch (\Exception $e) {
            return [
                'data' => [
                    'error' => $e->getMessage(),
                ],
                'code' => 500
            ];
        }
    }

    /**
     * @return array
     */
    public function list_all_users()
    {
        try {
            return [
                'data' => [
                    'status' => 'OK',
                    'users' => $this->userRepository->all()
                ],
                'code' => 200
            ];
        } catch (\Exception $e) {
            return [
                'data' => [
                    'error' => $e->getMessage(),
                ],
                'code' => 500
            ];
        }
    }

    /**
     * @param int $id
     * @return array
     */
    public function list_user_by_id(int $id)
    {
        try {

            if (!$user = $this->userRepository->findById($id)) {
                return [
                    'data' => ['error' => 'User not found'],
                    'code' => 404
                ];
            }
            return [
                'data' => [
                    'status' => 'OK',
                    'users' => $user
                ],
                'code' => 200
            ];
        } catch (\Exception $e) {
            return [
                'data' => [
                    'error' => $e->getMessage(),
                ],
                'code' => 500
            ];
        }
    }

    /**
     * @param array $params
     * @param int $id
     * @return array
     */
    public function update_user_by_id(array $params, int $id)
    {
        try {

            if (!$user = $this->userRepository->findById($id)) {
                return [
                    'data' => ['error' => 'User not found'],
                    'code' => 404
                ];
            }


            if ($this->userRepository->save($user, $params)) {
                return [
                    'data' => [
                        'status' => 'OK',
                        'Message' => 'Updated successfully'
                    ],
                    'code' => 201
                ];
            }
        } catch (\Exception $e) {
            return [
                'data' => [
                    'error' => $e->getMessage(),
                ],
                'code' => 500
            ];
        }
    }

    /**
     * @param int $id
     * @return array
     */
    public function delete_user(int $id)
    {
        try {
            if (!$this->userRepository->findById($id)) {
                return [
                    'data' => ['error' => 'User not found'],
                    'code' => 404
                ];
            }
            if ($this->userRepository->delete($id)) {
                return [
                    'data' => [
                        'status' => 'OK',
                        'Message' => 'Deleted successfully'
                    ],
                    'code' => 201
                ];
            }

        } catch (\Exception $e) {
            return [
                'data' => [
                    'error' => $e->getMessage(),
                ],
                'code' => 500
            ];
        }
    }

}
