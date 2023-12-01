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
            'title' => ('Majors'),
            'route' =>('major.index') ,
            'active' =>request()->routeIs('major.index') ,
            'policy' => [
                'method' => 'viewAny',
                'model' =>App\Models\Major::class
            ]
        ],
        [
            'title' => ('Curricula') ,
            'route' =>('curriculum.index') ,
            'active' =>request()->routeIs('curriculum.index') ,
            'policy' => [
                'method' => 'viewAny',
                'model' =>App\Models\Curriculum::class
            ]
        ],
        [
            'title' => ('Types'),
            'route' => ('type.index'),
            'active' => request()->routeIs('type.index'),
            'policy' => [
                'method' => viewAny,
                'model' =>App\Models\Type::class
            ]
        ],
        [
            'title' => ('Teacher Requests'),
            'route' => ('teacher_request.index'),
            'active' => request()->routeIs('teacher_request.index'),
            'policy' => [
                'method' => viewAny,
                'model' =>App\Models\TeacherRequest::class
            ]
        ],
        [
            'title' => ('Teaching Courses'),
            'route' => ('teacher.course.index',['teacher' => auth()->user()->teacher]),
            'active' =>request()->routeIs('teacher.course.index',['teacher' => auth()->user()->teacher]) ,
            'policy' => [
                'method' => viewTeachingCourse,
                'model' =>App\Model\Course::class
            ]
        ],
        [
            'title' => ('Studying Courses'),
            'route' =>('curriculum.course.index',['curriculum' => auth()->user()->student->curriculum]) ,
            'active' => request()->routeIs('curriculum.course.index',['curriculum' => auth()->user()->student->curriculum]),
            'policy' => [
                'method' => viewStudyingCourse,
                'model' =>App\Model\Course::class
            ]
        ],    
            [
                'title' => ('Courses'),
                'route' => ('course.index'),
                'active' => request()->routeIs('course.index'),
                'policy' => [
                    'method' => 'viewAny',
                    'model' =>App\Model\Course::class
                ]
        ],

    ],
];

