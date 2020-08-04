<?php

namespace Graph\GraphQL\Resolver;

abstract class Resolver {

    public abstract function resolve(array $args);
}