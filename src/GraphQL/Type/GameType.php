<?php

namespace Graph\GraphQl\Type;

use Graph\Entity\Game;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class GameType extends ObjectType
{
    static $type = null;

    public static function get()
    {
        if (self::$type === null) {
            self::$type = self::create();
        }
        return self::$type;
    }

    private static function create()
    {
        return new ObjectType([
            'name' => 'Game',
            'fields' => function () {
                return [
                    'id' => [
                        'type' => Type::nonNull(Type::id()),
                        'description' => 'Game SKU',
                        'resolve' => function (Game $game) {
                            return $game->getId();
                        }
                    ],
                    'sku' => [
                        'type' => Type::nonNull(Type::id()),
                        'description' => 'Game SKU',
                        'resolve' => function (Game $game) {
                            return $game->getSku();
                        }
                    ],
                    'name' => [
                        'type' => Type::nonNull(Type::string()),
                        'description' => 'Name of the game',
                        'resolve' => function (Game $game) {
                            return $game->getName();
                        }
                    ],
                    'description' => [
                        'type' => Type::nonNull(Type::string()),
                        'description' => 'Last name of the author',
                        'resolve' => function (Game $game) {
                            return $game->getDescription();
                        }
                    ],
                    'imageUrl' => [
                        'type' => Type::string(),
                        'description' => 'Last name of the author',
                        'resolve' => function (Game $game) {
                            return $game->getImageUrl();
                        }
                    ],
                    'isFree' => [
                        'type' => Type::nonNull(Type::boolean()),
                        'description' => 'Last name of the author',
                        'resolve' => function (Game $game) {
                            return $game->isFree();
                        }
                    ],
                    'releaseDate' => [
                        'type' => Type::string(),
                        'description' => 'Last name of the author',
                        'resolve' => function (Game $game) {
                            return $game->getReleaseDate();
                        }
                    ],

                ];
            }
        ]);
    }
}
