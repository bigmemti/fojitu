<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Curriculum;
use Illuminate\Http\Request;

class CourseListController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Course::class);

        $courses = Course::all();

        return view('course.index', [
            'courses' => $courses
        ]);
    }

    public function curriculum(Curriculum $curriculum)
    {
        $this->authorize('viewStudyingCourse', Course::class);

        $courses = $curriculum->courses;

        return view('course.index', [
            'courses' => $courses
        ]);
    }
}
