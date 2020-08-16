<?php

namespace Graph\GraphQL\Query;

use Graph\GraphQl\Type\GameType;
use GraphQL\Type\Definition\Type;

class WishListQuery
{
    public static function get() {
        return [
            'type' => Type::listOf(GameType::get()),
            'args' => [
                'userId' => ['type' => Type::nonNull(Type::id())],
            ],
            'resolve' => function ($root, array $args, $context) {
                return $context['WishListStorage']->getWishList($args['userId']);
            }
        ];
    }
}
