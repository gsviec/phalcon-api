<?php
defined('VERSION') || define('VERSION', 1);

return new \Phalcon\Config([
    'database' => [
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => '',
        'dbname'      => 'lackky',
        'charset'     => 'utf8',
    ],
    'mongodb' => [
        'uri'     => '"mongodb://root:password@localhost/dev"',

    ],
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
    'printNewLine' => true
]);
