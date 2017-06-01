<?php
namespace App\Models;

use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Collection;

/**
 * Class ModelBase
 */
class MongoBase extends Collection
{
    public static function getBuilder()
    {
        $di = FactoryDefault::getDefault();

        return $di->get('modelsManager')->createBuilder();
    }

    public static function modelQuery($query)
    {

    }
}
