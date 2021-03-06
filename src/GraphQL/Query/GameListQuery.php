<?php

namespace Graph\GraphQL\Query;

use Graph\GraphQl\Type\GameType;
use GraphQL\Type\Definition\Type;

class GameListQuery
{
    public static function get() {
        return [
            'type' => Type::listOf(GameType::get()),
            'resolve' => function ($root, array $args, $context) {
                return $context['GameStorage']->getAllGames();
            }
        ];
    }
}
