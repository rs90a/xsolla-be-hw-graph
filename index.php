<?php
// Test this using following command
// php -S localhost:8080 ./graphql.php &
// curl http://localhost:8080 -d '{"query": "query { echo(message: \"Hello World\") }" }'
// curl http://localhost:8080 -d '{"query": "mutation { sum(x: 2, y: 2) }" }'
require_once __DIR__ . '/vendor/autoload.php';

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Tuupola\Middleware\HttpBasicAuthentication\PdoAuthenticator;

require __DIR__ . '/src/Dependencies/dependencies.php';

$app = new App($container);
$container = $app->getContainer();

$app->add(new Tuupola\Middleware\HttpBasicAuthentication([
    'path' => ['/rest/user', '/graph'],
    'ignore' => [],
    'realm' => 'Protected',
//    "users" => [
//        "root" => "t00r",
//    ],
// htpasswd -nbBC 10 name password
    'authenticator' => new PdoAuthenticator([
        'pdo' => new PDO('mysql:host=localhost:3306' . ';dbname=summer2020', 'root', 'root'),
        'table' => 'users',
        'user' => 'username',
        'hash' => 'password',
    ])
]));

$app->get('/', function(Request $request, Response $response) {
    return $response->write(file_get_contents(__DIR__ . '/src/graphiql/index.html'));
});

$app->post('/graph', 'GraphQLController:process');


$app->group('/rest', function () {
    $this->group('/user', function() {
        $this->get('', 'UserController:getUserInfo');
        $this->get('/owned', 'UserController:getOwnedGames');
        $this->get('/wishlist', 'UserController:getWishlist');
    });
    $this->group('/game', function () {
        $this->get('', 'GameController:getGameCatalog');
        $this->get('/{game_id:[0-9]+}', 'GameController:getGame');
        $this->post('/{game_id:[0-9]+}', 'GameController:buyGame');
        $this->get('/sale', 'GameController:getOnSaleGames');
    });
});

$app->run();