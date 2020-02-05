<?php


namespace App\Services\Contracts;


interface UserServiceInterface
{
    public function login($credentials);
    public function create_user($params);

}
