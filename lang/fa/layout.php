<?php

return [
    'menu' => [
        [
            'title' => __('Dashboard'),
            'route' => route('dashboard'),
            'active' => request()->routeIs('dashboard')
        ],
        [
            'title' => __('Institutions'),
            'route' => route('institution.index'),
            'active' => request()->routeIs('institution.index'),
            'policy' => [
                'method' => 'viewAny',
                'model' => App\Models\Institution::class
            ]
        ],
        [
            'title' => __('Majors'),
            'route' =>route('major.index') ,
            'active' =>request()->routeIs('major.index') ,
            'policy' => [
                'method' => 'viewAny',
                'model' =>App\Models\Major::class
            ]
        ],
        [
            'title' => __('Curricula') ,
            'route' =>route('curriculum.index') ,
            'active' =>request()->routeIs('curriculum.index') ,
            'policy' => [
                'method' => 'viewAny',
                'model' =>App\Models\Curriculum::class
            ]
        ],
        [
            'title' => __('Types'),
            'route' =>route ('type.index'),
            'active' => request()->routeIs('type.index'),
            'policy' => [
                'method' => 'viewAny',
                'model' =>App\Models\Type::class
            ]
        ],
        [
            'title' => __('Teacher Requests'),
            'route' =>route ('teacher_request.index'),
            'active' => request()->routeIs('teacher_request.index'),
            'policy' => [
                'method' => 'viewAny',
                'model' =>App\Models\TeacherRequest::class
            ]
        ],
        [
            'title' => __('Teaching Courses'),
            'route' =>route ('teacher.course.index',['teacher' => auth()->user()->teacher??1]),
            'active' =>request()->routeIs('teacher.course.index',['teacher' => auth()->user()->teacher??1 ]) ,
            'policy' => [
                'method' => 'viewTeachingCourse',
                'model' =>App\Model\Course::class
            ]
        ],
        [
            'title' => __('Studying Courses'),
            'route' =>route('curriculum.course.index',['curriculum' => auth()->user()->student->curriculum??1]) ,
            'active' => request()->routeIs('curriculum.course.index',['curriculum' => auth()->user()->student->curriculum??1]),
            'policy' => [
                'method' => 'viewStudyingCourse',
                'model' =>App\Model\Course::class
            ]
        ],    
            [
                'title' => __('Courses'),
                'route' =>route ('course.index'),
                'active' => request()->routeIs('course.index'),
                'policy' => [
                    'method' => 'viewAny',
                    'model' =>App\Model\Course::class
                ]
        ],

    ],
];

