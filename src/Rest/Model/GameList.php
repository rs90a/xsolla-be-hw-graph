<?php

namespace Graph\Rest\Model;

class GameList
{
    /** @var null|string */
    protected $sku;

    /** @var null|string */
    protected $name;

    /** @var null|string */
    protected $description;

    /** @var null|string */
    protected $imageUrl;

    /** @var string */
    protected $releaseDate;

    public function toArray()
    {
        return [
          'sku' => $this->getSku(),
          'name' => $this->getName(),
          'imageUrl' => $this->getImageUrl(),
        ];
    }

    /**
     * @return string|null
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @param string|null $sku
     */
    public function setSku(?string $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
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
}
