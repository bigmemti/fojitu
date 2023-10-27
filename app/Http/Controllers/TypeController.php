<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('type.index',[
            'types' => Type::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        Type::create($request->validated());

        return to_route('type.index')->withSuccess(__('Type created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('type.show',[
            'type' => $type,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('type.edit',[
            'type'=> $type,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $type->update($request->validated());

        return to_route('type.index')->withSuccess(__('Type updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        if($type->isDeletable()){
            $type->delete();

            return to_route('type.index')->withSuccess(__('Type deleted successfully.'));
        }

        return to_route('type.index')->withErrors(__('Type can\'t be deleted.'));
    }
}
