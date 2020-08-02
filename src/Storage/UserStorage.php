<?php

namespace Graph\Storage;

use Doctrine\ORM\EntityManager;

class UserStorage
{

    /** @var EntityManager */
    protected $em;


    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getUserInfo()
    {
        return [];
    }
}