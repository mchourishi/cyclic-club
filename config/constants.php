<?php

return [
    'RIDERS' => [
        'APP'               => 'App\Rider',
        'DB_TABLE'          => 'riders',
        'PROPERTY_ID'       => 'id',
        'ROUTE' => [
            'INDEX'         => 'riders.index',
            'CREATE'        => 'riders.create',
            'STORE'         => 'riders.store'
        ],
        'FIELDS' => [
            'FIRST_NAME'    => 'firstName',
            'LAST_NAME'     => 'lastName',
            'GRADING'       => 'grading',
            'AGE'           => 'age',
            'GENDER'        => 'gender',
            'CLUB_ID'       => 'club_id'
        ]
    ],
    'RACES' => [
        'APP'               => 'App\Race',
        'DB_TABLE'          => 'races',
        'PROPERTY_ID'       => 'id',
        'ROUTE' => [
            'INDEX'         => 'races.index',
            'CREATE'        => 'races.create',
            'STORE'         => 'races.store',
            'SHOW'          => 'races.show'
        ],
        'FIELDS' => [
            'TITLE'         => 'title',
            'ADDRESS'       => 'address',
            'STATUS'        => 'status',
            'DATE_TIME'     => 'date_time',
            'CLUB_ID'       => 'club_id'
        ]
    ],
];
