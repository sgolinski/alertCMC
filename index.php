<?php

use alertCMC\Coin;
use alertCMC\Crawler;
use Maknz\Slack\Client as SlackClient;
use Maknz\Slack\Message;

require __DIR__ . '/vendor/autoload.php'; // Composer's autoloader

header("Content-Type: text/plain");

$serializedList = require 'serializedList0_300.php';
$serializedList = unserialize($serializedList);

$crawler = new Crawler();
$slack = new SlackClient('https://hooks.slack.com/services/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');;
$lastRoundCoins = null;

try {
    $lastRoundCoins = file_get_contents('last_rounded_coins.txt');
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}
if (empty($lastRoundCoins)) {
    $lastRoundCoins = [];
} else {
    $lastRoundCoins = unserialize($lastRoundCoins);
    shuffle($serializedList);
}

foreach ($serializedList as $coin) {
    try {
        assert($coin instanceof Coin);
        if (!array_search($coin->getName(), $lastRoundCoins)) {
            $data = $crawler->assignDetailInformationToCoin($coin->getCmcLink());
            if ($data[0]) {
                $percent = '-' . explode("\n", $data[1])[1];
            } else {
                $percent = explode("\n", $data[1])[1];
            }
            $percent = floatval($percent);
            if ($percent < -30.0) {
                $coin->setPercent($percent);
                $message = new Message();
                $message->setText($coin->getDescription());
                $slack->sendMessage($message);
                $crawler->returnArray[] = $coin;
            }
        }
    } catch
    (Exception $e) {
        $crawler->getClient()->quit();
        continue;
    }

}
$crawler->getClient()->quit();

if (count($crawler->returnArray) > 0) {
    file_put_contents('last_rounded_coins.txt', serialize($crawler->returnArray));
}

sleep(30);


