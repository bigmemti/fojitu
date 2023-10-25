<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Member;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Session $session, Attendance $attendance)
    {
        $members = Member::whereRelation('student.courses','courses.id', $session->course_id)
            ->WhereDoesntHave('sessions', fn($query) => $query->where('sessions.id', $session->id))
            ->get()->load(['student.user']);

        return view('attendance.index',[
            'session' => $session->load(['members.student.user']),
            'members' => $members->merge($session->members),
            'attendance' => $attendance
        ]);
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
    public function store(StoreAttendanceRequest $request, Session $session)
    {
        $session->attendances()->create($request->validated());

        return to_route('session.attendance.index', ['session' => $session]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        $attendance->update($request->validated());

        return to_route('session.attendance.index', ['session'=> $attendance->session]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
