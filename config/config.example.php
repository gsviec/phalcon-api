<?php
defined('VERSION') || define('VERSION', 'v1');

return new \Phalcon\Config([
    'database' => [
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => 'phanbook',
        'dbname'      => 'lackky',
        'charset'     => 'utf8',
    ],
    'version' => '1.0',
    'app' => [
        'debug'=> true
    ],

    /**
     * if true, then we print a new line at the end of each execution
     *
     * If we dont print a new line,
     * then the next command prompt will be placed directly on the left of the output
     * and it is less readable.
     *
     * You can disable this behaviour if the output of your application needs to don't have a new line at end
     */
    'printNewLine' => true,
    'resque' => [
        'REDIS_BACKEND'     => '54.163.62.129:6379',    // Set Redis Backend Info
        'REDIS_BACKEND_DB'  => '0',                 // Use Redis DB 0
        'COUNT'             => '1',                 // Run 1 worker
        'INTERVAL'          => '5',                 // Run every 5 seconds
        'QUEUE'             => '*',                 // Look in all queues
        'PREFIX'            => 'lackky_',         // Prefix queues with test
        'VVERBOSE'          => '1',
        'APP_INCLUDE'       => 'cli'
    ],
    'aws' => [
        'bucket' => 'lackky.dev'
    ],
    'slack' => [
        'channel' => 'lackky_dev',
        'token' => ''
    ],
     'mongodb' => [
        'uri'     => 'mongodb://localhost:27017/lackky_live',
    ],

]);