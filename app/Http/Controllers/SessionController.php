<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Session;
use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;

class SessionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        $this->authorize('create', Session::class);

        return view('session.create', ['course' => $course]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSessionRequest $request, Course $course)
    {
        $course->sessions()->create($request->validated());

        return to_route('course.show', ['course' => $course])->withSuccess(__('Session created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Session $session)
    {
        $this->authorize('view', $session);

        return view('session.show', ['session' => $session]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Session $session)
    {
        $this->authorize('update', $session);

        return view('session.edit', ['session' => $session]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSessionRequest $request, Session $session)
    {
        $session->update($request->validated());

        return to_route('course.show', ['course' => $session->course])->withSuccess(__('Session updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session)
    {
        $this->authorize('delete', $session);

        $session->delete();

        return to_route('course.show', ['course' => $session->course])->withSuccess(__('Session deleted successfully.'));
    }
}
