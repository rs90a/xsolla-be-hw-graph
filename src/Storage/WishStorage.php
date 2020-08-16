<?php

namespace Graph\Storage;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\Expr\Join;
use Graph\Entity\Game;
use Graph\Entity\Wish;

class WishStorage
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
            ->leftJoin('Graph\Entity\Wish',
                'wishList',
                Join::WITH,
                'game.id = wishList.gameId')
            ->where('wishList.userId = :userId')
            ->setParameter('userId', $userId);
        $query = $queryBuilder->getQuery();
        return $query->getResult();
    }

    /**
     * @param Wish $wish
     * @return bool
     */
    public function isExists(Wish $wish): bool
    {
        $queryBuilder = $this->em->createQueryBuilder();
        $queryBuilder
            ->select('count(wish.id)')
            ->from('Graph\Entity\Wish', 'wish')
            ->where('wish.userId = :userId AND wish.gameId = :gameId')
            ->setParameter('gameId', $wish->getGameId())
            ->setParameter('userId', $wish->getUserId());
        return $queryBuilder->getQuery()->getSingleScalarResult() > 0;
    }

    /**
     * @param Wish $wish
     * @return Game[]
     */
    public function create(Wish $wish): array
    {
        //Если игры в списке желаемого нет - добавляем
        if (!$this->isExists($wish)) {
            $this->em->persist($wish);
            $this->em->flush();
        }

        return $this->getWishList($wish->getUserId());
    }
}