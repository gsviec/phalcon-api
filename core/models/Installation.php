<?php
namespace App\Models;

use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Collection;

/**
 * Class ModelBase
 */
class Installation extends MongoBase
{
    public $deviceToken;
    public $channelUris;
    public $appName;
    public $appVersion;
    public $parseVersion;
    public $appIdentifier;
    public $channels = [];
    public $pushType;
    public $deviceType;
    public $GCMSenderId;
    /**
     * @var \MongoDB\Collection
     */
    protected $collection;

    public function initialize()
    {
        $this->setSource("Installation");
        $this->collection = $this->getDI()->get('mongo')->_Installation;

    }
    public static function getAll()
    {
        return Installation::find();
    }

    public function insertOne($data = [])
    {
        if (!isset($data['deviceToken']) || !isset($data['pushType'])
            || !isset($data['deviceType']) || !isset($data['GCMSenderId'])
        ) {
            throw new \ErrorException('Need provide correct data!');
        }
        $result = $this->collection->findOne(['deviceToken' => $data['deviceToken']]);
        if (!$result) {
            $result = $this->collection->insertOne([
                'channels' => isset($data['channels']) ? $data['channels'] : [],
                'deviceToken' => $data['deviceToken'],
                'pushType' => $data['pushType'],
                'deviceType' => $data['deviceType'],
                'GCMSenderId' => $data['GCMSenderId'],
                'installationId' => uniqid(true),
                'appName' => 'Lackky'
            ]);
            return $result->getInsertedId();

        }
        return $result->_id;

    }

    public function deleteOne($data)
    {
        if (!isset($data['deviceToken'])) {
            throw new \ErrorException('Need provide correct data!');
        }
        return $this->collection->deleteOne([
            'deviceToken' => $data['deviceToken']
        ]);
    }
}
