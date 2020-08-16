<?php

namespace Graph\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity
 * @Table(name="summer2020.game_sale")
 */
class GameOnSale
{
    /**
     * @var int
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var ArrayCollection
     * @Column(name="game_id", type="string")
     */
    private $gameId;

    /**
     * @var string
     * @Column(name="date_end", type="string")
     */
    private $dateEnd;

    /**
     * @var boolean
     * @Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return ArrayCollection
     */
    public function getGameId(): ArrayCollection
    {
        return $this->gameId;
    }

    /**
     * @param ArrayCollection $gameId
     */
    public function setGameId(ArrayCollection $gameId): void
    {
        $this->gameId = $gameId;
    }

    /**
     * @return string
     */
    public function getDateEnd(): string
    {
        return $this->dateEnd;
    }

    /**
     * @param string $dateEnd
     */
    public function setDateEnd(string $dateEnd): void
    {
        $this->dateEnd = $dateEnd;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }
}
