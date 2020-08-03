<?php

namespace Graph\Rest\Service;

use Graph\Entity\User;
use Graph\Storage\UserStorage;

class UserService
{
    /** @var UserStorage  */
    public $userStorage;

    public function __construct(
        UserStorage $userStorage
    ) {
        $this->userStorage = $userStorage;
    }

    public function getUserInfo(string $username)
    {
        /** @var User $userEntity */
        $userEntity = $this->userStorage->getUserInfo($username);

        if ($userEntity === null) {
            throw new \Exception('user not found', 404);
        }

        return [
            'id' => $userEntity->getId(),
            'username' => $userEntity->getUsername(),
            'isEnabled' => $userEntity->getIsEnabled(),
            'dateCreate' => $userEntity->getDateCreate(),
        ];
    }

    public function getWishlist(array $model)
    {
        // isUserExist?
        // $this->gameRepository->getUserWishlist($userModel);

        return ['id' => 1, 'email' => 'test@test.ru'];
    }

}