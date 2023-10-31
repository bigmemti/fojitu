<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Session;
use App\Models\HomeWork;
use App\Models\Submission;
use Morilog\Jalali\Jalalian;
use App\Http\Requests\StoreHomeWorkRequest;
use App\Http\Requests\UpdateHomeWorkRequest;

class HomeWorkController extends Controller
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
    public function create(Session $session)
    {
        return view("homework.create", [
            "session" => $session,
            'types' => Type::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHomeWorkRequest $request, Session $session)
    {
        $homework = $session->homeworks()->create([
            ...$request->validated(),
            'deadline' => $request->deadline ? Jalalian::fromFormat('Y/m/d H:i:s', $request->deadline)->toCarbon() : null,
        ]);

        $homework->types()->sync($request->validated()['types']);

        return to_route('session.show', ['session' => $session])->withSuccess(__('Homework created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(HomeWork $homework)
    {
        $submission = Submission::whereRelation('homework', 'home_works.id', $homework->id)->whereRelation('member.student.user', 'users.id', auth()->user()->id)->first();
        return view('homework.show',[
            'homework'=> $homework->load(['session.course']),
            'submission' => $submission,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomeWork $homework)
    {
        return view("homework.edit", [
            "homework" => $homework->load(['types']),
            "types"=> Type::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomeWorkRequest $request, HomeWork $homework)
    {
        $homework->update([
            ...$request->validated(),
            'deadline' => $request->deadline ? Jalalian::fromFormat('Y/m/d H:i:s', $request->deadline)->toCarbon() : null,
        ]);

        $homework->types()->sync($request->validated()["types"]);

        return to_route('session.show', ['session' => $homework->session_id])->withSuccess(__('Homework updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeWork $homework)
    {
        $session_id = $homework->session_id;
        $homework->delete();

        return to_route('session.show', ['session' => $session_id])->withSuccess(__('Homework updated successfully'));
    }
}
