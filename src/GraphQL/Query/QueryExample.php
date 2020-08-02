<?php

namespace Graph\GraphQL\Query;

use GraphQL\Type\Definition\Type;

class QueryExample
{
    public static function get()
    {
        return [
            'type' => Type::string(),
            'args' => [
                'message' => ['type' => Type::string()],
            ],
            'resolve' => function ($rootValue, $args) {
                return 'some lulz: '. $args['message'];
            }
        ];
    }
}
