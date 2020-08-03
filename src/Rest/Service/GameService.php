<?php

namespace Graph\Rest\Service;

use Graph\Rest\Model\Game;
use Graph\Entity\Game as GameEntity;
use Graph\Rest\Model\GameList;
use Graph\Storage\GameStorage;

class GameService
{
    /** @var GameStorage  */
    public $gameStorage;

    public function __construct(
        GameStorage $gameStorage
    ) {
        $this->gameStorage = $gameStorage;
    }

    public function getGame(int $gameId)
    {
        /** @var GameEntity $gameEntity */
        $gameEntity = $this->gameStorage->getGameById($gameId);

        if ($gameEntity === null) {
            throw new \Exception("not found game with id = ${gameId}");
        }

        return $this->convertEntityToModelFull($gameEntity);
    }

    public function getAllGames(): array
    {
        $gameList = $this->gameStorage->getAllGames();

        if (count($gameList) === 0) {
            throw new \Exception("Well... fuck");
        }

        return $this->convertEntityCollectionToModel($gameList);
    }

    public function getOnSaleGames()
    {
        $sales = $this->gameStorage->getGameOnSale();

        return $this->convertSaleEntityCollectionToModel($sales);
    }

    private function convertSaleEntityCollectionToModel($entityList): array
    {
        $result = [];
        /** @var GameEntity $gameEntity */
        foreach ($entityList as $gameEntity) {
            $result['saleDateEnd'] = $gameEntity['dateEnd'];

            // #грязь_тут!
            $result[$gameEntity['gameObj']->getSku()] = $this->convertEntityToModelList($gameEntity['gameObj'])->toArray();
            // #грязь_тут!
        }
        return $result;
    }

    private function convertEntityCollectionToModel($entityList): array
    {
        $result = [];
        /** @var GameEntity $gameEntity */
        foreach ($entityList as $gameEntity) {
            $result[$gameEntity->getSku()] = $this->convertEntityToModelList($gameEntity)->toArray();
        }
        return $result;
    }

    private function convertEntityToModelFull(GameEntity $gameEntity): Game
    {
        $model = new Game();
        $model->setSku($gameEntity->getSku());
        $model->setName($gameEntity->getName());
        $model->setDescription($gameEntity->getDescription());
        $model->setImageUrl($gameEntity->getImageUrl());
        $model->setReleaseDate($gameEntity->getReleaseDate());

        return $model;
    }

    private function convertEntityToModelList(GameEntity $gameEntity): GameList
    {
        $model = new GameList();
        $model->setSku($gameEntity->getSku());
        $model->setName($gameEntity->getName());
        $model->setImageUrl($gameEntity->getImageUrl());

        return $model;
    }

}