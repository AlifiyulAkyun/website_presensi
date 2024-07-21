<?php

namespace App\Services;

use PhpMqtt\Client\MqttClient;

class MqttService
{
    protected $client;

    public function __construct()
    {
        $this->client = new MqttClient('broker.sinaungoding.com', 1883, 'laravel-client');
    }

    public function connect()
    {
        $this->client->connect('uwais', 'uw415_4Lqarn1');
    }

    public function subscribe($topic, $callback)
    {
        $this->client->subscribe($topic, function ($topic, $message) use ($callback) {
            $callback($message);
        }, 0);
    }

    public function loop()
    {
        $this->client->loop(true);
    }
}