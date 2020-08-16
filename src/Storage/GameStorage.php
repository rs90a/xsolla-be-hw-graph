<?php

namespace Graph\Storage;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\Expr\Join;
use Graph\Entity\Game;

class qgitqGameStorage
{
    /** @var EntityManager */
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @return Game[]
     */
    public function getAllGames(): array
    {
        $games = $this->em
            ->getRepository(Game::class)
            ->findAll();

        return $games;
    }

    /**
     * @param int $gameId
     * @return Game|null
     */
    public function getGameById(int $gameId): ?Game
    {
        /** @var Game $game */
        $game = $this->em
            ->getRepository(Game::class)
            ->findOneBy(['id' => $gameId]);

        return $game;
    }

    /**
     * @return Game[]
     */
    public function getGameOnSale(): array
    {
        /** @var Game $game */
        $queryBuilder = $this->em->createQueryBuilder();
        $queryBuilder
            ->select('game')
            ->from('Graph\Entity\Game', 'game')
            ->leftJoin('Graph\Entity\GameOnSale',
                'gameOnSale',
                Join::WITH,
                'game.id = gameOnSale.gameId')
            ->where('gameOnSale.isActive = 1');
        $query = $queryBuilder->getQuery();
        return $query->getResult();
    }

    public function create(Game $game): Game
    {
        $this->em->persist($game);
        $this->em->flush();

        return $game;
    }
}