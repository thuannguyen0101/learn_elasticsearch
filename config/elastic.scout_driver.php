<?php declare(strict_types=1);

return [
    'index' => [
        'prefix' => env('ELASTIC_SCOUT_DRIVER_INDEX_PREFIX', ''),
    ],

    'connection' => [
        'hosts' => [
            env('ELASTICSEARCH_HOST', 'localhost:9200'),
        ],
    ],
];

