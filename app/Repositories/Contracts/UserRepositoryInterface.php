<?php


namespace App\Repositories\Contracts;


interface UserRepositoryInterface
{
    public function create(array $newUser);
    public function all();
    public function findById(int $id);
    public function findByEmail(string $email);

}
