<?php


namespace App\Repositories\Contracts;


use App\User;

interface ContactRepositoryInterface
{
    public function create(array $new);
    public function all();
    public function findById(int $id);
    public function save(User $user,array $params);
    public function delete(int $id);

}
