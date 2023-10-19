<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Http\Requests\StoreMajorRequest;
use App\Http\Requests\UpdateMajorRequest;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("major.index", [
            "majors"=> Major::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("major.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMajorRequest $request)
    {
        Major::create($request->validated());

        return to_route("major.index")->withSuccess(__('Major created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        return view('major.show', [
            'major'=> $major
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Major $major)
    {
        return view('major.edit', [
            'major'=> $major
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMajorRequest $request, Major $major)
    {
        $major->update($request->validated());

        return to_route('major.index')->withSuccess(__('Major updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        $major->delete();

        return to_route('major.index')->withSuccess(__('Major deleted successfully'));
    }
}
