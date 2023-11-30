<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Organization;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Models\User;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('organization.index' , ['organizations' => Organization::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        return view('organization.create' , ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrganizationRequest $request)
    {

        Organization::create($request->validated());

        return to_route('organization.index')->withSuccess(__('organization created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        return view('organization.edit' , ['organization' => $organization]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrganizationRequest $request, Organization $organization)
    {
        $organization->update($request->validated());

        return to_route('organization.index')->withSuccess(__('organization edited successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();

        return to_route('organization.index')->withSuccess(__('organization deleted successfully.'));

    }

}