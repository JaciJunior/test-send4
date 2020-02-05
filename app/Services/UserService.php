<?php


namespace App\Services;


use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    private $userRepository;

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
                    'data' => ['error' =>'Username or password is invalid'],
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
                'data' =>[
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

            if ($this->userRepository->create(['name' => $params['name'],'email' => $params['email'],'password' => Hash::make($params['password']),])) {
                return [
                    'data' => [
                        'status' => 'OK',
                        'Message' => 'Registered successfully'
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
