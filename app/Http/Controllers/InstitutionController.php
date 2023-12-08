<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Http\Requests\StoreInstitutionRequest;
use App\Http\Requests\UpdateInstitutionRequest;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("institution.index", [
            "institutions"=> Institution::all() 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("institution.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInstitutionRequest $request)
    {
        Institution::create($request->validated());

        return to_route("institution.index")->withSuccess(__('Institution created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Institution $institution)
    {
        return view('institution.show', [
            'institution'=> $institution
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Institution $institution)
    {
        return view('institution.edit', [
            'institution'=> $institution
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstitutionRequest $request, Institution $institution)
    {
        $institution->update($request->validated());

        return to_route('institution.index')->withSuccess(__('Institution updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institution $institution)
    {
        $institution->delete();

        return to_route('institution.index')->withSuccess(__('Institution deleted successfully'));
    }
}