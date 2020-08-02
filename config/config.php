<?php

    return [
        'settings' => [
            'graphql' => [
                /*
                * OFF (0)
                * INCLUDE_DEBUG_MESSAGE (1)
                * INCLUDE_TRACE(2)
                * RETHROW_INTERNAL_EXCEPTIONS (4)
                */
                'debug' => 4,
                'maxDepth' => 15,
                'introspection' => true,
            ],
            'displayErrorDetails' => true,
            'doctrine' => [
                // if true, metadata caching is forcefully disabled
                'dev_mode' => true,

                // path where the compiled metadata info will be cached
                // make sure the path exists and it is writable
                'cache_dir' => __DIR__ . '/../cache',

                // you should add any other path containing annotated entity classes
                'metadata_dirs' => [__DIR__ . '/../src/Entity'],

                'connection' => [
                    'driver' => 'pdo_mysql',
                    'host' => '127.0.0.1',
                    'port' => 3306,
                    'dbname' => 'summer2020',
                    'user' => 'root',
                    'password' => 'root',
                    'charset' => 'UTF8'
                ]
            ],
        ]
    ];
