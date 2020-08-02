<?php

namespace Graph\Rest\Service;


class UserService
{
    /** @var GameService  */
    public $gameService;

    public function __construct(
        GameService $gameService //REPO
    ) {
        $this->gameService = $gameService;
    }

    public function getUserInfo(array $model)
    {
        return ['id' => 1, 'email' => 'test@test.ru'];
    }

    public function getWishlist(array $model)
    {
        $userExist = true;
//        $this->gameRepository->getWishlistGames($userModel);

        return ['id' => 1, 'email' => 'test@test.ru'];
    }

    public function getOwnedGames(array $model)
    {
        $userExist = true;
        //$this->gameRepository->getOwnedGames($userModel);
        return ['id' => 1, 'email' => 'test@test.ru'];
    }

}