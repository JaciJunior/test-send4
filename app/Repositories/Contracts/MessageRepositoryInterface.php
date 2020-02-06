<?php

namespace App\Repositories\Contracts;

use App\Model\Messages\MessagesModel;

interface MessageRepositoryInterface
{
    public function create(array $new);

    public function all();

    public function findById(int $id);

    public function findByIdContact(int $id);

    public function update(MessagesModel $user, array $params);

    public function delete(int $id);

}
