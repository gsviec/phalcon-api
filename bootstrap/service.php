<?php
use Phalcon\Security;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Mvc\Model\Manager as ModelsManager;
use Phalcon\Logger\Adapter\File as FileAdapter;
use MongoDB\Client as MClient;

/**
 * The FactoryDefault Dependency Injector automatically
 * register the right services providing a full stack framework
 */

/**
 * Register the configuration itself as a service
 */
$config = include config_path('config.php');

if (file_exists(config_path('/config.' . APPLICATION_ENV . '.php'))) {
    $overrideConfig = include config_path('/config.' . APPLICATION_ENV . '.php');
    $config->merge($overrideConfig);
}

$di->set('config', $config, true);

$di->set(
    'modelsManager',
    function () {
        return new ModelsManager();
    }
);


// Database connection is created based in the parameters defined in the configuration file
$di->set(
    'db',
    function () use ($di) {
        return new Mysql(
            [
                'host'     => $di->get('config')->database->mysql->host,
                'username' => $di->get('config')->database->mysql->username,
                'password' => $di->get('config')->database->mysql->password,
                'dbname'   => $di->get('config')->database->mysql->dbname,
                'options'  => [
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . $di->get('config')->database->mysql->charset
                ]
            ]
        );
    },
    true // shared
);

$di->set(
    'security',
    function () {

        $security = new Security();
        //Set the password hashing factor to 12 rounds
        $security->setWorkFactor(12);

        return $security;
    },
    true
);
/**
 * The logger component
 */
$di->set(
    'logger',
    function () use ($di) {
        $logger = app_path('logs/') . date('Y-m-d') . '.log';
        return new FileAdapter($logger, ['model' => 'a+']);
    },
    true
);

$di->setShared('mongo', function () {
    $config = $this->getConfig();

    $client = new MClient($config->mongodb->uri);
    return $client->selectDatabase($config->mongodb->dbname);
});