<?php

namespace Graph\GraphQL\Mutation;

use Exception;
use Graph\Entity\Wish;
use Graph\GraphQl\Type\GameType;
use GraphQL\Type\Definition\Type;

class CreateWish
{
    public static function get()
    {
        return
            [
                'type' => Type::listOf(GameType::get()),
                'args' => [
                    'gameId' => [
                        'type' => Type::id(),
                        'description' => 'Game Id'
                    ]
                ],
                'resolve' => function ($root, array $args, $context) {
                    $wish = new Wish();
                    $wish->setUserId($context['user']->getId());
                    $wish->setGameId($args['gameId']);

                    $game = $context['GameStorage']->getGameById($wish->getGameId());
                    if (isset($game) && $game)
                        return $context['WishStorage']->create($wish);

                    throw new Exception("The game with id = {$wish->getGameId()} does not exist");
                },
            ];
    }
}
