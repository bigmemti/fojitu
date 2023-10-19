<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use App\Http\Requests\StorePracticeRequest;
use App\Http\Requests\UpdatePracticeRequest;
use App\Models\Topic;

class PracticeController extends Controller
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
    public function create(Topic $topic)
    {
        return view("practice.create", [
            'topic' => $topic
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePracticeRequest $request, Topic $topic)
    {
        $topic->practices()->create($request->validated());

        return to_route('topic.show', ['topic' => $topic])->withSuccess(__('Practice created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Practice $practice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Practice $practice)
    {
        return view('practice.edit', [
            'practice' => $practice
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePracticeRequest $request, Practice $practice)
    {
        $practice->update($request->validated());

        return to_route('topic.show', [ 'topic' => $practice->topic])->withSuccess(__('Practice updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Practice $practice)
    {
        $topic_id = $practice->topic_id;
        $practice->delete();

        return to_route('topic.show', ['topic'=> $topic_id])->withSuccess(__('Practice deleted successfully'));
    }
}
