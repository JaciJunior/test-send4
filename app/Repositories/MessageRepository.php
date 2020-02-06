<?php

namespace App\Repositories;

use App\Model\Contacts\ContactsModel;
use App\Model\Messages\MessagesModel;
use App\Repositories\Contracts\MessageRepositoryInterface;

class MessageRepository implements MessageRepositoryInterface
{
    private $message;
    private $contact;

    /**
     * MessageRepository constructor.
     * @param MessagesModel $model
     * @param ContactsModel $contactsModel
     */
    public function __construct(MessagesModel $model, ContactsModel $contactsModel)
    {
        $this->message = $model;
        $this->contact = $contactsModel;
    }

    /**
     * @param array $new
     * @return mixed
     */
    public function create(array $new)
    {
        return $this->message->create($new);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->message->paginate(100);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findById(int $id)
    {
        return $this->message::find($id);
    }

    /**
     * @param MessagesModel $message
     * @param array $params
     * @return bool
     */
    public function update(MessagesModel $message, array $params)
    {
        return $message->update($params);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        $message = $this->message::find($id);
        return $message->delete();
    }

    /**
     * @param int $id
     * @return array
     */
    public function findByIdContact(int $id)
    {
        $data = [
            'contact' => $this->contact->find($id),
            'messages' => $this->contact->find($id)->messages
        ];
        return $data;
    }
}
