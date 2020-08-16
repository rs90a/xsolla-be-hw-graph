<?php

namespace Graph\Storage;

use Doctrine\ORM\EntityManager;
use Graph\Entity\User;

class UserStorage
{

    /** @var EntityManager */
    protected $em;


    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getUserInfo(string $username): ?User
    {
        /** @var User $user */
        $user = $this->em
            ->getRepository("\Graph\Entity\User")
            ->findOneBy(['username' => $username]);

        return $user;
    }
}