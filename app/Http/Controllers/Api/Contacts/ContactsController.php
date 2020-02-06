<?php

namespace App\Http\Controllers\Api\Contacts;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\IdRequest;
use App\Services\Contracts\ContactServiceInterface;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    private $contactService;

    public function __construct(ContactServiceInterface $contactService)
    {
        $this->contactService = $contactService;
    }


    /**
     * return all contacts.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $return = $this->contactService->list_all_contact();
        return response()->json($return['data'], $return['code']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ContactRequest $request)
    {
        $return = $this->contactService->create_contact($request->all());
        return response()->json($return['data'], $return['code']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $return = $this->contactService->list_contacts_by_id($id);
        return response()->json($return['data'], $return['code']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ContactRequest $request, $id)
    {
        $return = $this->contactService->update_contact_by_id($request->all(), $id);
        return response()->json($return['data'], $return['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $return = $this->contactService->delete_contact($id);
        return response()->json($return['data'], $return['code']);
    }
}
