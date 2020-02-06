<?php


namespace App\Repositories;

use App\Model\Contacts\ContactsModel;
use App\Repositories\Contracts\ContactRepositoryInterface;
use App\User;

class ContactRepository implements ContactRepositoryInterface
{
    private $contact;

    /**
     * ContactRepository constructor.
     * @param ContactsModel $model
     */
    public function __construct(ContactsModel $model)
    {
        $this->contact = $model;
    }

    /**
     * @param array $new
     * @return mixed
     */
    public function create(array $new)
    {
        return $this->contact->create($new);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->contact->paginate(100);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findById(int $id)
    {
        return $this->contact::find($id);
    }

    /**
     * @param ContactsModel $contact
     * @param array $params
     * @return bool
     */
    public function update(ContactsModel $contact, array $params)
    {
        return $contact->update($params);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        $contact = $this->contact::find($id);
        return $contact->delete();
    }
}
