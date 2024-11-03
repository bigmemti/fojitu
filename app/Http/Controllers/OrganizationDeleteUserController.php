<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBoxRequest;
use App\Http\Requests\UpdateBoxRequest;

class OrganizationDeleteUserController extends Controller
{
    public function __invoke()
    {
        //
    }

    public function edit(Organization $organization)
    {
        $boxes = Box::whereHas("organizations" , function($query) use ($organization) {
            $query->where("organization_id" , $organization->id);
        })->get();

        return view('organization-user.edit' , ['boxes' => $boxes , 'organization' => $organization]);
    }

    public function update(UpdateBoxRequest $request , Organization $organization)
    {
        $organization->boxes()->detach($request->box);

        return to_route('organization.show',['organization' => $organization])->withSuccess(__('organization created successfully.'));
    }

}
