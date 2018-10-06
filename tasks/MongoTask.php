<?php
use Clue\React\Redis\Client;
use Clue\React\Redis\Factory;

class MongoTask extends MainTask
{
    /**
     * @param array $argv such as channel
     * @return null
     */
    public function mainAction($argv)
    {
         $collection = $this->getDI()->get('mongo')->messi_db;

         var_dump($collection->find()->toArray());
    }
}