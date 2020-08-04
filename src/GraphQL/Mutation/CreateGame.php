<?php

namespace Graph\GraphQL\Mutation;

use Graph\Entity\Game;
use Graph\GraphQl\Type\GameType;
use GraphQL\Type\Definition\Type;

class CreateGame
{
    public static function get()
    {
        return
            [
                'type' => GameType::get(),
                'args' => [
                    'sku' => [
                        'type' => Type::nonNull(Type::string()),
                        'description' => 'Unique ID',
                    ],
                    'name' => [
                        'type' => Type::nonNull(Type::string()),
                    ],
                    'description' => [
                        'type' => Type::string(),
                    ],
                ],
                'resolve' => function ($root, array $args, $context) {

                    $entity = new Game();
                    $entity->setSku($args['sku']);
                    $entity->setName($args['name']);
                    $entity->setIsEnabled(true);



                    if( isset($args['description'])) {
                        $entity->setDescription($args['description']);
                    }
                    if( isset($args['releaseDate'])) {
                        $entity->setReleaseDate($args['releaseDate']);
                    }
                    if( isset($args['isFree'])) {
                        $entity->setDescription($args['isFree']);
                    }
                    if( isset($args['description'])) {
                        $entity->setDescription($args['imageUrl']);
                    }

                    return $context['GameStorage']->create($entity);
                },
            ];
    }
}
