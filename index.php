<?php

use alertCMC\Coin;
use alertCMC\Crawler;
use Maknz\Slack\Client as SlackClient;
use Maknz\Slack\Message;

require __DIR__ . '/vendor/autoload.php'; // Composer's autoloader

header("Content-Type: text/plain");

$serializedList = require 'serializedList.php';
$serializedList = unserialize($serializedList);

$crawler = new Crawler();
$slack = new SlackClient('https://hooks.slack.com/services/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');;

$lastRoundCoins = file_get_contents('last_rounded_coins.txt');

if (empty($lastRoundCoins)) {
    $lastRoundCoins = [];
} else {
    unserialize($lastRoundCoins);
    shuffle($arr);
}

foreach ($serializedList as $coin) {
    try {
        assert($coin instanceof Coin);
        $data = $crawler->assignDetailInformationToCoin($coin->getCmcLink());
        if ($data[0]) {
            $percent = '-' . explode("\n", $data[1])[1];
        } else {
            $percent = explode("\n", $data[1])[1];
        }
        $percent = floatval($percent);
        if ($percent < -30.0) {
            $coin->setPercent($percent);
            $crawler->returnArray[] = $coin;
        }

    } catch (Exception $e) {
        $crawler->getClient()->quit();
        continue;
    }
}
$crawler->getClient()->quit();

$alertCoins = Crawler::removeDuplicates($crawler->returnArray, $lastRoundCoins);

foreach ($alertCoins as $coin) {
    assert($coin instanceof Coin);
    $message = new Message();
    $message->setText($coin->getDescription());
    $slack->sendMessage($message);
}

file_put_contents('last_rounded_coins.txt', serialize($alertCoins));


