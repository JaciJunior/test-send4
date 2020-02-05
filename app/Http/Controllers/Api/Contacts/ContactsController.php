<?php

namespace App\Http\Controllers\Api\Contacts;

use App\Services\Contracts\ContactServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    private $contactService;
//
//
    public function __construct(ContactServiceInterface $contactService)
    {
        $this->contactService = $contactService;
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $return = $this->contactService->list_all_contact();
        return response()->json($return['data'],$return['code']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
