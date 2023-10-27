<?php

namespace App\Http\Controllers;

use App\Models\Mime;
use App\Http\Requests\StoreMimeRequest;
use App\Http\Requests\UpdateMimeRequest;
use App\Models\Type;

class MimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Type $type)
    {
        return view('mime.index', [
            'type' => $type->load(['mimes']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Type $type)
    {
        return view('mime.create', [
            'type' => $type,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMimeRequest $request, Type $type)
    {
        $type->mimes()->create($request->validated());

        return to_route('type.mime.index', ['type' => $type])->withSuccess(__('Mime created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Mime $mime)
    {
        return view('mime.show', [
            'mime' => $mime,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mime $mime)
    {
        return view('mime.edit', [
            'mime' => $mime,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMimeRequest $request, Mime $mime)
    {
        $mime->update($request->validated());

        return to_route('type.mime.index', ['type' => $mime->type])->withSuccess(__('Mime updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mime $mime)
    {
        $type = $mime->type;
        $mime->delete();

        return to_route('type.mime.index', ['type' => $type])->withSuccess(__('Mime deleted successfully.'));
    }
}
