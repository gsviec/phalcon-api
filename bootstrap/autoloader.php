<?php
use Phalcon\Loader;

require 'constants.php';
(new Loader)
    ->registerNamespaces([
        'App\Models'       => ROOT_DIR . '/core/models/',
        'App\Controllers'  => ROOT_DIR . '/app/controllers/',
        'App\Responses'    => ROOT_DIR . '/core/responses/',
        'App\Transformer'  => ROOT_DIR . '/core/transformer/'
    ])
    ->registerDirs([
        ROOT_DIR . '/tasks/'
    ])
    ->registerFiles([
        ROOT_DIR . '/bootstrap/helpers.php',
    ])
    ->register();

// Register The Composer Auto Loader
require_once ROOT_DIR . '/vendor/autoload.php';
