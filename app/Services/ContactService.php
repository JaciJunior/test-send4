<?php

namespace App\Services;

use App\Repositories\Contracts\ContactRepositoryInterface;
use App\Services\Contracts\ContactServiceInterface;

class ContactService implements ContactServiceInterface
{
    private $contactRepository;

    /**
     * ContactService constructor.
     * @param ContactRepositoryInterface $contactRepository
     */
    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * @param array $params
     * @return array
     */
    public function create_contact(array $params)
    {
        try {

            if ($id = $this->contactRepository->create([
                'name' => $params['name'],
                'surname' => $params['surname'],
                'telephone' => $params['telephone'],
                'email' => $params['email']
            ])) {
                return [
                    'data' => [
                        'status' => 'OK',
                        'Message' => 'Registered successfully'
                    ],
                    'code' => 201,
                    'id'=>$id
                ];
            }
        } catch (\Exception $e) {
            return [
                'data' => [
                    'error' => $e->getMessage(),
                ],
                'code' => 500
            ];
        }
    }

    /**
     * @return array
     */
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

    /**
     * @param int $id
     * @return array
     */
    public function list_contacts_by_id(int $id)
    {
        try {
            if (!$contact = $this->contactRepository->findById($id)) {
                return [
                    'data' => ['error' => 'Contact not found'],
                    'code' => 404
                ];
            }

            return [
                'data' => [
                    'status' => 'OK',
                    'users' => $contact
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

    /**
     * @param array $params
     * @param int $id
     * @return array
     */
    public function update_contact_by_id(array $params, int $id)
    {
        try {

            if (!$user = $this->contactRepository->findById($id)) {
                return [
                    'data' => ['error' => 'Contact not found'],
                    'code' => 404
                ];
            }


            if ($this->contactRepository->update($user, $params)) {
                return [
                    'data' => [
                        'status' => 'OK',
                        'Message' => 'Updated successfully'
                    ],
                    'code' => 201
                ];
            }
        } catch (\Exception $e) {
            return [
                'data' => [
                    'error' => $e->getMessage(),
                ],
                'code' => 500
            ];
        }
    }

    /**
     * @param int $id
     * @return array
     */
    public function delete_contact(int $id)
    {
        try {
            if (!$this->contactRepository->findById($id)) {
                return [
                    'data' => ['error' => 'Contact not found'],
                    'code' => 404
                ];
            }
            if ($this->contactRepository->delete($id)) {
                return [
                    'data' => [
                        'status' => 'OK',
                        'Message' => 'Deleted successfully'
                    ],
                    'code' => 201
                ];
            }

        } catch (\Exception $e) {
            return [
                'data' => [
                    'error' => $e->getMessage(),
                ],
                'code' => 500
            ];
        }
    }
}
