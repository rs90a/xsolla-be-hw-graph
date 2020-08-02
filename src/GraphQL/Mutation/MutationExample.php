<?php

namespace Graph\GraphQL\Mutation;

use GraphQL\Type\Definition\Type;

class MutationExample
{
    public static function get()
    {
        return
            [
                'type' => Type::int(),
                'args' => [
                    'x' => ['type' => Type::int()],
                    'y' => ['type' => Type::int()],
                ],
                'resolve' => function ($calc, $args) {
                    return $args['x'] + $args['y'];
                },
            ];
    }
}
