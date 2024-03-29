<?php

namespace App\Repositories\Contracts;

use App\Model\Contacts\ContactsModel;

interface ContactRepositoryInterface
{
    public function create(array $new);

    public function all();

    public function findById(int $id);

    public function update(ContactsModel $user, array $params);

    public function delete(int $id);
}
