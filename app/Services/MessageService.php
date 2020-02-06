<?php

namespace App\Services;

use App\Repositories\Contracts\MessageRepositoryInterface;
use App\Services\Contracts\MessageServiceInterface;

class MessageService implements MessageServiceInterface
{
    private $messageRepository;

    /**
     * MessageService constructor.
     * @param MessageRepositoryInterface $messageRepository
     */
    public function __construct(MessageRepositoryInterface $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    /**
     * @param array $params
     * @return array
     */
    public function create_message(array $params)
    {
        try {

            if ($id = $this->messageRepository->create([
                'description' => $params['description'],
                'contact_id' => $params['contact_id']
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
    public function list_all_message()
    {
        try {
            return [
                'data' => [
                    'status' => 'OK',
                    'users' => $this->messageRepository->all()
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
    public function list_message_by_id(int $id)
    {
        try {
            if (!$message = $this->messageRepository->findById($id)) {
                return [
                    'data' => ['error' => 'Message not found'],
                    'code' => 404
                ];
            }

            return [
                'data' => [
                    'status' => 'OK',
                    'users' => $message
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
    public function list_message_by_contact(int $id)
    {
        try {
            if (!$message = $this->messageRepository->findByIdContact($id)) {
                return [
                    'data' => ['error' => 'Message not found'],
                    'code' => 404
                ];
            }

            return [
                'data' => [
                    'status' => 'OK',
                    'users' => $message
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
    public function update_message_by_id(array $params, int $id)
    {
        try {

            if (!$message = $this->messageRepository->findById($id)) {
                return [
                    'data' => ['error' => 'Message not found'],
                    'code' => 404
                ];
            }


            if ($this->messageRepository->update($message, $params)) {
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
    public function delete_message(int $id)
    {
        try {
            if (!$this->messageRepository->findById($id)) {
                return [
                    'data' => ['error' => 'Contact not found'],
                    'code' => 404
                ];
            }
            if ($this->messageRepository->delete($id)) {
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
