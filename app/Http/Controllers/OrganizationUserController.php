<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBoxRequest;

class OrganizationUserController extends Controller
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
        $boxes = Box::whereDoesntHave("organizations" , function($query) use ($organization) {
            $query->where("organization_id" , $organization->id);
        })->get();

        return view('organization-user.create' , ['boxes' => $boxes , 'organization' => $organization]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBoxRequest $request , Organization $organization)
    {
        $organization->boxes()->attach($request->box);

        return to_route('organization.show',['organization' => $organization])->withSuccess(__('organization created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        $boxes = Box::whereHas("organizations" , function($query) use ($organization) {
            $query->where("organization_id" , $organization->id);
        })->get();

        return view('organization-user.edit' , ['boxes' => $boxes , 'organization' => $organization]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}