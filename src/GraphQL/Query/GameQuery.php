<?php

namespace Graph\GraphQL\Query;

use Graph\GraphQl\Type\GameType;
use GraphQL\Type\Definition\Type;

class GameQuery
{
    public static function get() {
        return [
            'type' => GameType::get(),
            'args' => [
                'id' => Type::nonNull(Type::id()),
            ],
            'resolve' => function ($root, array $args, $context) {
                $id = $args['id'];
                if (!is_numeric($args['id'])) {
                    $id = intval(substr(base64_decode($args['id']), strlen('author')));
                }

                return $context['GameStorage']->getGameById($id);
            }
        ];
    }
}
