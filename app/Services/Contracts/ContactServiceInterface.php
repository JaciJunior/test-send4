<?php


namespace App\Services\Contracts;


interface ContactServiceInterface
{
    public function create_contact(array $params);
    public function list_all_contact();
    public function list_contacts_by_id(int $id);
    public function update_contact_by_id(array $params, int $id);
    public function delete_contact(int $id);

}
