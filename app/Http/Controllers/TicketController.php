<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Box;
use App\Models\Message;
use App\Models\Organization;
use Illuminate\Validation\Rules\Can;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("ticket.index" , ["tickets" => Ticket::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ticket.create' , ["organizations" => Organization::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request, Box $box)
    {
        $ticket = $box->tickets()->create($request->validated());

        Message::create(
            ["ticket_id" => $ticket->id,
             "box_id" => $box->id,
             "message" => $request->message
            ]
        );

        return to_route('box.ticket.index', ['box' => $box])->withSuccess(__('ticket created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('ticket.show' , ['ticket' => $ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return view('ticket.edit' , ['ticket' => $ticket , 'organizations' => Organization::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {

        $ticket->update($request->validated());

        return to_route('box.ticket.index', ['box' => $ticket->box_id])->withSuccess(__('ticket edited successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}