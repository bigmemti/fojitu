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
        // [
            // 'title' => ,
            // 'route' => ,
            //'active' => ,
            // 'policy' => [
            //     'method' => ,
            //     'model' =>
            // ]
        // ],
    ],
];

