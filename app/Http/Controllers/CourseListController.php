<?php

namespace App\Http\Controllers;

use App\Models\Course;
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
}
