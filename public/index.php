<?php
use Phalcon\Mvc\Application;

// Register the auto loader
require __DIR__.'/../bootstrap/autoloader.php';

try {

    require app_path('bootstrap/service.php');

    $router = $di->getRouter();

    
    $router->handle();

    // Pass the processed router parameters to the dispatcher
    $dispatcher = $di->getDispatcher();
    $dispatcher->setControllerName($router->getControllerName());
    $dispatcher->setActionName($router->getActionName());
    $dispatcher->setParams($router->getParams());
    $dispatcher->dispatch();

    // Get the returned value by the last executed action
    $response = $dispatcher->getReturnedValue();
    // Check if the action returned is a 'response' object
    if ($response instanceof Phalcon\Http\ResponseInterface) {
        // Send the response
        $response->send();
    }
} catch (Exception $e) {
    echo $e->getMessage();
    d($e->getTraceAsString());
}

