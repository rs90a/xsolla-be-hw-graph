<?php


use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Cache\FilesystemCache;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Tools\Setup;
use Graph\GraphQL\Controller\GraphQLController;
use Graph\Storage\GameStorage;
use Graph\Rest\Controller\GameController;
use Graph\Rest\Controller\UserController;
use Graph\Rest\Service\GameService;
use Graph\Rest\Service\UserService;
use Graph\Storage\UserStorage;
use Slim\Container;

require_once __DIR__ . '/../GraphQL/Schema/schema.php';

$configuration = require(__DIR__ . '/../../config/config.php');

$container = new Container($configuration);

/**
 * GraphQL
*/
$container['schema'] = $schema;


$container['GameStorage'] = function($container) {
    return new GameStorage(
        $container['EntityManager']
    );
};

$container['GameService'] = function ($container) {
    return new GameService(
        $container['GameStorage']
    );
};

$container['UserService'] = function ($container) {
  return new UserService(
      $container['UserStorage']
  );
};


$container['UserController'] = function ($container) {
  return new UserController(
      $container['UserService']
  );
};

$container['GameController'] = function ($container): GameController {
    return new GameController(
        $container['GameService']
    );
};


$container['UserStorage'] = function($container) {
    return new UserStorage(
        $container['EntityManager']
    );
};

$container['GraphQLController'] = function($container) {
    $maxDepth = isset($container['settings']['graphql']) && isset($container['settings']['graphql']['maxDepth']) ? $container['settings']['graphql']['maxDepth'] : 15;
    $introspection = isset($container['settings']['graphql']) && isset($container['settings']['graphql']['introspection']) ? $container['settings']['graphql']['introspection'] : true;
    $debug = isset($container['settings']['graphql']) && isset($container['settings']['graphql']['debug']) ? $container['settings']['graphql']['debug'] : 0;

    return new GraphQLController($container, $maxDepth, $introspection, $debug);
};


$container['EntityManager'] = function (Container $container): EntityManager {
    $config = Setup::createAnnotationMetadataConfiguration(
        $container['settings']['doctrine']['metadata_dirs'],
        $container['settings']['doctrine']['dev_mode']
    );

    $config->setMetadataDriverImpl(
        new AnnotationDriver(
            new AnnotationReader,
            $container['settings']['doctrine']['metadata_dirs']
        )
    );

    $config->setMetadataCacheImpl(
        new FilesystemCache(
            $container['settings']['doctrine']['cache_dir']
        )
    );

    return EntityManager::create(
        $container['settings']['doctrine']['connection'],
        $config
    );
};

