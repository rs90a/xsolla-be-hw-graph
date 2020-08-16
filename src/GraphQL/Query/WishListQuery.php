<?php

namespace Graph\GraphQL\Query;

use Graph\GraphQl\Type\GameType;
use GraphQL\Type\Definition\Type;

class WishListQuery
{
    public static function get()
    {
        return [
            'type' => Type::listOf(GameType::get()),
            'resolve' => function ($root, array $args, $context) {
                return $context['WishStorage']->getWishList($context['user']->getId());
            }
        ];
    }
}
