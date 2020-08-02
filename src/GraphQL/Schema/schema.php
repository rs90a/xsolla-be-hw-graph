<?php

use Graph\GraphQL\Query\GameQuery;
use Graph\GraphQL\Query\QueryExample;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use GraphQL\Type\Definition\ObjectType;

$queryType = new ObjectType([
    'name' => 'Query',
    'fields' => [
        'echo' => [
            'type' => Type::string(),
            'args' => [
                'message' => ['type' => Type::string()],
            ],
            'resolve' => function ($rootValue, $args) {
                return $rootValue['prefix'] . $args['message'];
            }
        ],
        'lul' => QueryExample::get(),
        'game' => GameQuery::get(),
    ],
]);

$mutationType = new ObjectType([
    'name' => 'Calc',
    'fields' => [
        'sum' => [
            'type' => Type::int(),
            'args' => [
                'x' => ['type' => Type::int()],
                'y' => ['type' => Type::int()],
            ],
            'resolve' => function ($calc, $args) {
                return $args['x'] + $args['y'];
            },
        ],
    ],
]);

// See docs on schema options:
// http://webonyx.github.io/graphql-php/type-system/schema/#configuration-options
$schema = new Schema([
    'query' => $queryType,
    'mutation' => $mutationType,
]);
