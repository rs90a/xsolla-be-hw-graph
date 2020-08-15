<?php

namespace Graph\Storage;

use Doctrine\ORM\EntityManager;
use Graph\Entity\Game;

class GameStorage
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
        $query = $this->em->createQuery('
            SELECT game FROM Graph\Entity\Game game 
            JOIN game.sale sale
            WHERE sale.isActive = 1
        ');

        return $query->getResult();
    }

    public function create(Game $game): Game
    {
        $this->em->persist($game);
        $this->em->flush();

        return $game;
    }
}