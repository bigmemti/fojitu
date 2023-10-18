<?php

namespace App\Http\Controllers;

use App\Models\HomeWork;
use App\Http\Requests\StoreHomeWorkRequest;
use App\Http\Requests\UpdateHomeWorkRequest;
use App\Models\Session;

class HomeWorkController extends Controller
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
    public function create(Session $session)
    {
        return view("homework.create", [
            "session" => $session,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHomeWorkRequest $request, Session $session)
    {
        $session->homeworks()->create($request->validated());

        return to_route('session.show', ['session' => $session])->withSuccess(__('Homework created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(HomeWork $homeWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomeWork $homeWork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomeWorkRequest $request, HomeWork $homeWork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeWork $homeWork)
    {
        //
    }
}
