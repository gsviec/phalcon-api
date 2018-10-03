<?php

use Phalcon\Mvc\Router\Group;
use Phalcon\Mvc\Router;

$router = new Router(false);
$router->setDefaults([
    'controller' => 'tests',
    'action'     => 'index'
]);
$router->removeExtraSlashes(true);
$prefix = '/' . VERSION . '/';
//tests
$tests = new Group(['controller' => 'tests']);
$tests->setPrefix($prefix . 'tests');
$tests->addGet('', ['action' => 'index']);
$tests->addGet('/{id:[0-9]+}', ['action' => 'view']);
$tests->addPost('/new', ['action' => 'new']);
$tests->addPut('/{id:[0-9]+}', ['action' => 'update']);
$tests->addGet('/logger', ['action' => 'logger']);
$tests->addGet('mongo', ['action' => 'mongo']);



//task
$data = new Group(['controller' => 'data']);
$data->setPrefix($prefix . 'data');
$data->addGet('', ['action' => 'index']);
$data->addPost('/image', ['action' => 'image']);

//token
$token = new Group(['controller' => 'token']);
$token->setPrefix($prefix . 'token');
$token->add('',['action' => 'index']);
$token->addDelete('/{id}',['action' => 'delete']);

//render html app for seo
$render = new Group(['controller' => 'render']);
$render->setPrefix($prefix . 'render');
$render->add('', ['action' => 'index']);
//mount
$router->mount($token);
$router->mount($tests);
$router->mount($data);
$router->mount($render);


return $router;
