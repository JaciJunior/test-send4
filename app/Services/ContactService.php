<?php

namespace App\Services;

use App\Repositories\Contracts\ContactRepositoryInterface;
use App\Services\Contracts\ContactServiceInterface;

class ContactService implements ContactServiceInterface
{
    private $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }


    public function create_contact(array $params)
    {
        // TODO: Implement create_contact() method.
    }

    public function list_all_contact()
    {
        try {
            return [
                'data' => [
                    'status' => 'OK',
                    'users' => $this->contactRepository->all()
                ],
                'code' => 200
            ];
        } catch (\Exception $e) {
            return [
                'data' => [
                    'error' => $e->getMessage(),
                ],
                'code' => 500
            ];
        }
    }

    public function list_contacts_by_id(int $id)
    {
        // TODO: Implement list_contacts_by_id() method.
    }

    public function update_contact_by_id(array $params, int $id)
    {
        // TODO: Implement update_contact_by_id() method.
    }

    public function delete_contact(int $id)
    {
        // TODO: Implement delete_contact() method.
    }
}
