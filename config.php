<?php

// Simple config example
// return [
//     'parameters' => [
//         'host'=> 'localhost',
//         'dbname'=> 'test_php',
//     ],
//     'type' => 'sqlite',
//     'user' => 'asem',
//     'password' => ''
// ];

/**
 * you can set your config like the following
 * for more configuration information
 */
return [
    'database' => [
        'sqlite' => [
            'parameters' => [
                'path' => 'db.sqlite'
            ],
            'type' => 'sqlite'
        ],
        'mysqli' => [
            'parameters' => [
                'host'=> 'localhost',
                'dbname'=> 'test_php',
            ],
            'type' => 'sqlite',
            'user' => 'asem',
            'password' => ''
        ]
    ]
];