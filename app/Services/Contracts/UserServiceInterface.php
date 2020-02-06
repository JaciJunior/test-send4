<?php


namespace App\Services\Contracts;


interface UserServiceInterface
{
    public function login($credentials);

    public function create_user($params);

    public function list_all_users();

    public function list_user_by_id(int $id);

    public function update_user_by_id(array $params, int $id);

    public function delete_user(int $id);

}
