<?php


namespace App\Services\Contracts;


interface MessageServiceInterface
{
    public function create_message(array $params);

    public function list_all_message();

    public function list_message_by_id(int $id);

    public function list_message_by_contact(int $id);

    public function update_message_by_id(array $params, int $id);

    public function delete_message(int $id);

}
