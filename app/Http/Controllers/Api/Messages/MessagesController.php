<?php

namespace App\Http\Controllers\Api\Messages;

use App\Http\Requests\MessageRequest;
use App\Services\Contracts\MessageServiceInterface;
use App\Http\Controllers\Controller;

class MessagesController extends Controller
{
    private $message;

    /**
     * MessagesController constructor.
     * @param MessageServiceInterface $message
     */
    public function __construct(MessageServiceInterface $message)
    {
        $this->message = $message;
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $return = $this->message->list_all_message();
        return response()->json($return['data'],$return['code']);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(MessageRequest $request)
    {
        $return = $this->message->create_message($request->all());
        return response()->json($return['data'],$return['code']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $return = $this->message->list_message_by_id($id);
        return response()->json($return['data'],$return['code']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(MessageRequest $request,$id)
    {
        $return = $this->message->update_message_by_id($request->all(),$id);
        return response()->json($return['data'],$return['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $return = $this->message->delete_message($id);
        return response()->json($return['data'],$return['code']);
    }

    /**
     * List all messages from contact ID.
     * @param $contact
     * @return \Illuminate\Http\JsonResponse
     */
    public function list_by_contact($contact){
        $return = $this->message->list_message_by_contact($contact);
        return response()->json($return['data'],$return['code']);
    }
}
