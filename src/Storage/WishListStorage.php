<?php

namespace Graph\Storage;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\Expr\Join;
use Graph\Entity\Game;

class WishListStorage
{
    /** @var EntityManager */
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param $userId
     * @return Game[]
     */
    public function getWishList($userId): array
    {
        /** @var Game $game */
        $queryBuilder = $this->em->createQueryBuilder();
        $queryBuilder
            ->select('game')
            ->from('Graph\Entity\Game', 'game')
            ->leftJoin('Graph\Entity\WishList',
                'wishList',
                Join::WITH,
                'game.id = wishList.gameId')
            ->where('wishList.userId = :userId')
            ->setParameter('userId', $userId);
        $query = $queryBuilder->getQuery();
        return $query->getResult();
    }
}