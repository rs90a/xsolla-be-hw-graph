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
                if (isset($context['user']) && $context['user'])
                    return $context['WishListStorage']->getWishList($context['user']->getId());
                return [];
            }
        ];
    }
}
