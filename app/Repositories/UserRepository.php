<?php


namespace App\Repositories;


use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    private $user;

    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->user = $model;
    }

    /**
     * @param array $newUser
     * @return mixed
     */
    public function create(array $newUser)
    {
        return $this->user->create($newUser);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->user->paginate(100);
    }

    /*
     *
     */
    public function findById(int $id)
    {
        return $this->user::find($id);
    }

    /**
     * @param string $email
     * @return mixed
     */
    public function findByEmail(string $email)
    {
        return $this->user->where('email', $email)->first();
    }

    /**
     * @param User $user
     * @param array $params
     * @return bool
     */
    public function save(User $user, array $params)
    {

        return $user->update([
            'name' => $params['name'],
            'email' => $params['email'],
            'password' => Hash::make($params['password'])
        ]);

    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        $user = $this->user::find($id);
        return $user->delete();
    }
}
