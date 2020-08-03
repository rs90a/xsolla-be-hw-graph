<?php

namespace Graph\Rest\Controller;

use Graph\Rest\Service\UserService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController
{
    /** @var UserService */
    private $userService;

    public function __construct(
        UserService $userService
    ) {
        $this->userService = $userService;
    }

    public function getUserInfo(Request $request, Response $response)
    {
        $username = 'tester';

        $result = $this->userService->getUserInfo($username);

        return $response->withStatus(200)->withJson($result);
    }

    public function getWishlist(Request $request, Response $response)
    {
        $input = json_decode($request->getBody(), true);
        $requestModel = $input;

        $result = $this->userService->getWishlist($requestModel);

        return $response->withStatus(200)->withJson($result);
    }
}