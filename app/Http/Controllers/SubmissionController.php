<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\HomeWork;
use App\Models\Submission;
use App\Services\FileService;
use App\Http\Requests\StoreSubmissionRequest;
use App\Http\Requests\UpdateSubmissionRequest;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(HomeWork $homework)
    {
        return view("submission.index",[
            "homework"=> $homework->load(['submissions.member.student.user'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(HomeWork $homework)
    {
        return view("submission.create",[
            "homework"=> $homework->load([
                'types.mimes',
                'submissions' => fn($query) => $query->whereRelation('member.student.user', 'users.id', auth()->user()->id)
            ])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubmissionRequest $request, HomeWork $homework)
    {
        $member_id = Member::whereRelation('student.user', 'users.id', auth()->user()->id)
        ->whereRelation('course', 'courses.id', $homework->session->course->id)
        ->first()->id;

        $submission = $homework->submissions()->create([
            ...$request->validated(),
            'member_id' => $member_id
        ]);

        if($request->files)
        {
            $files = FileService::makeFiles($request->file('files'), 'homeworks/'. $member_id);

            $submission->files()->sync($files->pluck('id')->toArray());
        }

        return to_route('homework.show', ['homework' => $homework])->withSuccess(__('Submission created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Submission $submission)
    {
        return view('submission.show',[
            'submission' => $submission->load(['files', 'member.student.user', 'homework.session.course.teacher.user'])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submission $submission)
    {
        return view('submission.edit', [
            'submission' => $submission->load(['files'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubmissionRequest $request, Submission $submission)
    {
        $submission->update($request->validated());

        if($request->files)
        {
            $files = FileService::makeFiles($request->file('files'), 'homeworks/' . $submission->member->id);

            $submission->files()->sync($files->merge($submission->files)->pluck('id')->toArray());
        }

        return to_route('submission.edit', ['submission' => $submission])->withSuccess(__('Submission updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        //
    }
}
