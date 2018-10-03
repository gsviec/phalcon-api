<?php
use Clue\React\Redis\Client;
use Clue\React\Redis\Factory;

class ImportRedisTask extends MainTask
{
    /**
     * @param array $argv such as channel
     * @return null
     */
    public function mainAction($argv)
    {
        $loop = React\EventLoop\Factory::create();
        $factory = new Factory($loop);
        $channel = $argv[0] ??  'channel';
        $factory->createClient($this->config->redis)->then(
            function (Client $client) use ($channel) {
                $client->subscribe($channel)->then(function () use ($channel) {
                    echo 'Now subscribed to channel ' . $channel . PHP_EOL;
                });
                $client->on('message', function ($channel, $message) {
                    $messageArray = json_decode($message, true);
                    $data = new \App\Models\Data();
                    $data->setLoggerLevel($messageArray['severity']);
                    $data->setData($message);
                    $data->setCreatedAt(date('Y-m-d H:i:s'));
                    if (!$data->save()) {
                        var_dump($data->getMessages());
                    }
                });
            },
            function (\Exception $e) {
                var_dump($e->getMessage());
            }
        );
        $loop->run();
    }
}