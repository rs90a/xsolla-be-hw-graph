<?php

namespace Graph\GraphQL\Controller;

use GraphQL\Error\DebugFlag;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use GraphQL\GraphQL;

class GraphQLController
{
    const MAX_DEPTH = 15;

    protected $container;
    protected $maxDepth;
    protected $introspection;
    protected $debug;

    public function __construct($container, int $maxDepth = 15, bool $introspection = true, int $debug = 0)
    {
        $this->container = $container;
        $this->maxDepth = $maxDepth;
        $this->introspection = $introspection;
        $this->debug = $debug;
    }

    public function process(Request $request, Response $response)
    {
        $schema = $this->container['schema'];

        $input = json_decode($request->getBody(), true);
        $query = $input['query'];

        $variableValues = isset($input['variables']) ? $input['variables'] : null;

        $debug = DebugFlag::INCLUDE_DEBUG_MESSAGE | DebugFlag::INCLUDE_TRACE;
        $result = GraphQL::executeQuery($schema, $query, null, $this->container, $variableValues);
        $output = $result->toArray($debug);

        return $response->withJson($output);
    }
}
