<?php

namespace App\Repositories\Contracts;

use App\User;

interface UserRepositoryInterface
{
    public function create(array $newUser);

    public function all();

    public function findById(int $id);

    public function findByEmail(string $email);

    public function save(User $user, array $params);

    public function delete(int $id);

}
