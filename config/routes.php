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


//task
$upload = new Group(['controller' => 'upload']);
$upload->setPrefix($prefix . 'upload');
$upload->addPost('', ['action' => 'index']);

//token
$token = new Group(['controller' => 'token']);
$token->setPrefix($prefix . 'token');
$token->add('',['action' => 'index']);
$token->addDelete('/{id}',['action' => 'delete']);

//mount
$router->mount($token);
$router->mount($tests);
$router->mount($upload);

return $router;
