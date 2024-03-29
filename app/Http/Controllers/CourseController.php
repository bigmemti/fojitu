<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Curriculum;
use App\Models\Teacher;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Teacher $teacher)
    {
        $this->authorize('viewTeachingCourse', Course::class);

        $courses = $teacher->courses;

        return view('course.index', [
            'courses' => $courses,
            'teacher' => $teacher
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Teacher $teacher)
    {
        $this->authorize('create', [Course::class, $teacher->institution]);

        return view('course.create', [
            'teacher' => $teacher,
            'curricula' => Curriculum::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request, Teacher $teacher)
    {
        $teacher->courses()->create($request->validated());

        return to_route('teacher.course.index', ['teacher' => $teacher])->withSuccess(__('Course created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $this->authorize('view', $course);

        return view('course.show', [
            'course' => $course->load(['sessions', 'students.user', 'teacher.user', 'curriculum' => fn($query) => $query->with(['institution', 'major'])])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $this->authorize('update', $course);

        return view('course.edit', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());

        return to_route('teacher.course.index', ['teacher' => $course->teacher])->withSuccess(__('Course updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $this->authorize('delete', $course);

        $course->delete();

        return to_route('teacher.course.index', ['teacher' => $course->teacher])->withSuccess(__('Course deleted successfully.'));
    }
}
