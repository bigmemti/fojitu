<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Http\Requests\StoreCurriculumRequest;
use App\Http\Requests\UpdateCurriculumRequest;
use App\Models\Major;
use App\Models\University;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("curriculum.index", [
            "curricula"=> Curriculum::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("curriculum.create",[
            "universities"=> University::all(),
            "majors"=> Major::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCurriculumRequest $request)
    {
        Curriculum::create($request->validated());

        return to_route("curriculum.index")->withSuccess(__('Curriculum created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Curriculum $curriculum)
    {
        return view('curriculum.show', [
            'curriculum'=> $curriculum
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curriculum $curriculum)
    {
        return view('curriculum.edit', [
            'curriculum'=> $curriculum,
            "universities"=> University::all(),
            "majors"=> Major::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCurriculumRequest $request, Curriculum $curriculum)
    {
        $curriculum->update($request->validated());

        return to_route('curriculum.index')->withSuccess(__('Curriculum updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curriculum $curriculum)
    {
        $curriculum->delete();

        return to_route('curriculum.index')->withSuccess(__('Curriculum deleted successfully'));
    }
}
