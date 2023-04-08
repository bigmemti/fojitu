<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;

class SessionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('session.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSessionRequest $request)
    {
        // Session::create($request->validated());

        return to_route('session.index')->withSuccess(__('Session created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Session $session)
    {
        return view('session.show', ['session' => $session]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Session $session)
    {
        return view('session.edit', ['session' => $session]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSessionRequest $request, Session $session)
    {
        $session->update($request->validated());

        return to_route('session.index')->withSuccess(__('Session updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session)
    {
        $session->delete();

        return to_route('session.index')->withSuccess(__('Session deleted successfully.'));
    }
}
