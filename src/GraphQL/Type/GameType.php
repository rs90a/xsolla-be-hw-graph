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
                        'type' => Type::id(),
                        'description' => 'Game Id',
                        'resolve' => function (Game $game) {
                            return $game->getId();
                        }
                    ],
                    'sku' => [
                        'type' => Type::nonNull(Type::string()),
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
                        'type' => Type::string(),
                        'description' => 'Description of the game',
                        'resolve' => function (Game $game) {
                            return $game->getDescription();
                        }
                    ],
                    'imageUrl' => [
                        'type' => Type::string(),
                        'description' => 'Url of image',
                        'resolve' => function (Game $game) {
                            return $game->getImageUrl();
                        }
                    ],
                    'isFree' => [
                        'type' => Type::nonNull(Type::boolean()),
                        'description' => 'Game is free',
                        'resolve' => function (Game $game) {
                            return $game->isFree();
                        }
                    ],
                    'releaseDate' => [
                        'type' => Type::string(),
                        'description' => 'Release date of the game',
                        'resolve' => function (Game $game) {
                            return $game->getReleaseDate();
                        }
                    ],

                ];
            }
        ]);
    }
}
