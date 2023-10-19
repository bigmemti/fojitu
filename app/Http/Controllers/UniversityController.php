<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Http\Requests\StoreUniversityRequest;
use App\Http\Requests\UpdateUniversityRequest;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("university.index", [
            "universities"=> University::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("university.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUniversityRequest $request)
    {
        University::create($request->validated());

        return to_route("university.index")->withSuccess(__('University created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(University $university)
    {
        return view('university.show', [
            'university'=> $university
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(University $university)
    {
        return view('university.edit', [
            'university'=> $university
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUniversityRequest $request, University $university)
    {
        $university->update($request->validated());

        return to_route('university.index')->withSuccess(__('University updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(University $university)
    {
        $university->delete();

        return to_route('university.index')->withSuccess(__('University deleted successfully'));
    }
}
