<?php


namespace App\Repositories;


use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
    private $user;

    public function __construct(User $model)
    {
        $this->user = $model;
    }

    public function create(array $newUser)
    {
        return $this->user->create($newUser);
    }

    public function all()
    {
        return $this->user->all();
    }

    public function findById(int $id)
    {
        return $this->user::find($id);
    }


    public function findByEmail(string $email)
    {
       return $this->user->where('email',$email)->first();
    }
}
