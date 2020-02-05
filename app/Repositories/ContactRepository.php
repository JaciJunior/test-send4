<?php


namespace App\Repositories;


use App\Model\Contacts\ContactsModel;
use App\Repositories\Contracts\ContactRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\Hash;

class ContactRepository implements ContactRepositoryInterface
{
    private $contact;

    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(ContactsModel $model)
    {
        $this->contact = $model;
    }

    public function create(array $new)
    {
        // TODO: Implement create() method.
    }

    public function all()
    {
        return $this->contact->paginate(100);
    }

    public function findById(int $id)
    {
        // TODO: Implement findById() method.
    }

    public function save(User $user, array $params)
    {
        // TODO: Implement save() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}
