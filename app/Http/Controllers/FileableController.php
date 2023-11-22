<?php

namespace App\Http\Controllers;

use App\Models\Fileable;
use App\Http\Requests\StoreFileableRequest;
use App\Http\Requests\UpdateFileableRequest;

class FileableController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFileableRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Fileable $fileable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fileable $fileable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFileableRequest $request, Fileable $fileable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fileable $fileable)
    {
        $file = $fileable->file;

        $fileable->delete();

        $file->delete();

        return back()->withSuccess(__('File deleted successfully.'));
    }
}
