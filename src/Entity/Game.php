<?php

namespace Graph\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity
 * @Table(name="summer2020.game")
 */
class Game
{
    /**
     * @var int
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Column(name="sku", type="string")
     */
    private $sku;

    /**
     * @var string
     * @Column(name="name", type="string")
     */
    private $name;

    /**
     * @var null|string
     * @Column(name="description", type="string")
     */
    private $description;

    /**
     * @var null|string
     * @Column(name="image_url", type="string")
     */
    private $imageUrl;

    /**
     * @var string
     * @Column(name="release_date", type="string")
     */
    private $releaseDate;

    /**
     * @var boolean
     * @Column(name="is_free", type="boolean")
     */
    private $isFree;

    /**
     * @var boolean
     * @Column(name="is_enabled", type="boolean")
     */
    private $isEnabled;

    /**
     * @var ArrayCollection
     * @OneToMany(
     *     targetEntity="GameOnSale",
     *     mappedBy="game",
     *     cascade={"persist"}
     * )
     */
    private $sale;

    public function __construct()
    {
        $this->isFree = false;
        $this->isEnabled = true;
    }

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
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     */
    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    /**
     * @param string|null $imageUrl
     */
    public function setImageUrl(?string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    /**
     * @return string
     */
    public function getReleaseDate(): ?string
    {
        return $this->releaseDate;
    }

    /**
     * @param string $releaseDate
     */
    public function setReleaseDate(string $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * @return bool
     */
    public function isFree(): bool
    {
        return $this->isFree;
    }

    /**
     * @param bool $isFree
     */
    public function setIsFree(bool $isFree): void
    {
        $this->isFree = $isFree;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->isEnabled;
    }

    /**
     * @param bool $isEnabled
     */
    public function setIsEnabled(bool $isEnabled): void
    {
        $this->isEnabled = $isEnabled;
    }

    /**
     * @return ArrayCollection
     */
    public function getSale(): ArrayCollection
    {
        return $this->sale;
    }

    /**
     * @param ArrayCollection $sale
     */
    public function setSale(ArrayCollection $sale): void
    {
        $this->sale = $sale;
    }
}
