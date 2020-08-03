<?php

namespace Graph\Rest\Controller;

use Graph\Rest\Service\GameService;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class GameController
{
    /** @var GameService */
    private $gameService;

    public function __construct(
        GameService $gameService
    ) {
        $this->gameService = $gameService;
    }

    public function getGame(Request $request, Response $response, array $args)
    {
        $gameId = (int)$args['game_id'];

        $result = $this->gameService->getGame($gameId);

        return $response->withJson($result->toArray());
    }

    public function getGameCatalog(Request $request, Response $response)
    {
        $result = $this->gameService->getAllGames();

        return $response->withStatus(200)->withJson($result);
    }

    public function getOnSaleGames(Request $request, Response $response)
    {
        $result = $this->gameService->getOnSaleGames();

        return $response->withJson($result);
    }
}