<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Ticket;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request , Ticket $ticket)
    {
        $ticket->messages()->create([
            'message' => $request->message,
            'ticket_id' => $ticket->id,
            'box_id' => auth()->user()->box->id
        ]);

        return to_route('ticket.show', ['ticket' => $ticket] )->withSuccess(__('message was sent successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message , Ticket $ticket)
    {
        return view('message.edit' , ['message'=>$message , 'ticket'=>$ticket]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        $message->update([
            'message' => $request->message,
        ]);

        return to_route('ticket.show', ['ticket' => $message->ticket] )->withSuccess(__('message was sent successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return to_route('ticket.show', ['ticket' => $message->ticket] )->withSuccess(__('message was sent successfully.'));
    }
}