<?php

namespace App\Http\Controllers;

use App\Models\TeacherRequest;
use App\Http\Requests\StoreTeacherRequestRequest;
use App\Http\Requests\UpdateTeacherRequestRequest;
use App\Models\User;

class TeacherRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("teacher-request.index",[
            "teacher_requests"=> TeacherRequest::all(),
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
    public function store(StoreTeacherRequestRequest $request, User $user)
    {
        $user->teacher_request()->create($request->validated());

        return to_route('dashboard')->withSuccess(__('your request has sent.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(TeacherRequest $teacher_request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeacherRequest $teacher_request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequestRequest $request, TeacherRequest $teacher_request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherRequest $teacher_request)
    {
        //
    }
}
