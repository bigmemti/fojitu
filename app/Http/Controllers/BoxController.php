<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Http\Requests\StoreBoxRequest;
use App\Http\Requests\UpdateBoxRequest;
use App\Models\Organization;

class BoxController extends Controller
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
    public function create(Organization $organization)
    {
        $boxes = Box::all();
        return view('box.create' , ['boxes' => $boxes , 'organization' => $organization]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBoxRequest $request , Organization $organization)
    {


        $organization->boxes()->attach($request->box);

        return to_route('organization.index')->withSuccess(__('organization created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Box $box)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Box $box)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBoxRequest $request, Box $box)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Box $box)
    {
        //
    }
}