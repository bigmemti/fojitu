<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;

class TopicController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('topic.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTopicRequest $request)
    {
        // Topic::create($request->validated());

        return to_route('topic.index')->withSuccess(__('Topic created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        return view('topic.show', ['topic' => $topic]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        return view('topic.edit', ['topic' => $topic]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        $topic->update($request->validated());

        return to_route('topic.index')->withSuccess(__('Topic updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();

        return to_route('topic.index')->withSuccess(__('Topic deleted successfully.'));
    }
}
