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
        $input = json_decode($request->getBody(), true);

        $requestModel = ['auth_data' => false];

        $result = $this->userService->getUserInfo($requestModel);

        return $response->withStatus(200)->withJson($result);
    }

    public function getOwnedGames(Request $request, Response $response)
    {
        $input = json_decode($request->getBody(), true);
//        $query = $input['query'];

        $requestModel = $input;

        $result = $this->userService->getOwnedGames($requestModel);

        return $response->withStatus(200)->withJson($output);
    }

    public function getWishlist(Request $request, Response $response)
    {
        $input = json_decode($request->getBody(), true);
        $requestModel = $input;

        $result = $this->userService->getWishlist($requestModel);
        $output = $result->toArray();

        return $response->withStatus(200)->withJson($output);
    }
}