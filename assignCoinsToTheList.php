<?php

use alertCMC\Coin;
use alertCMC\Crawler;
use Maknz\Slack\Client as SlackClient;
use Maknz\Slack\Message;

require __DIR__ . '/vendor/autoload.php'; // Composer's autoloader

$arr = require 'arrayBeforeSerialization.php';

header("Content-Type: text/plain");

$crawler = new Crawler();

$slack = new SlackClient('https://hooks.slack.com/services/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');;

foreach ($arr as $coin) {
    $data = $crawler->assignAddressAndNameToCoin(trim($coin));
    if ($data[0] && $data[1] && $data[2]) {
        $token = new Coin($data[0], $data[2], $data[1]);
        $crawler->returnArray[] = $token;
    }
}
$crawler->getClient()->quit();

//file_put_contents('last_rounded_coins.txt', serialize($crawler->returnArray));
file_put_contents('newList.txt', serialize($crawler->returnArray));


