<?php

namespace alertCMC;

use ArrayIterator;
use Exception;
use Facebook\WebDriver\Remote\RemoteWebElement;
use Facebook\WebDriver\WebDriverBy;
use Symfony\Component\Panther\Client as PantherClient;

class Crawler
{
    private PantherClient $client;
    public $returnArray;

    public function __construct()
    {
        $this->client = PantherClient::createChromeClient();
        $this->returnArray = [];

    }

    public function assignDetailInformationToCoin($link)
    {
        $this->client->refreshCrawler();
        $this->client->get($link);
        $percent = $this->client->getCrawler()
            ->filter('div.sc-16r8icm-0.kjciSH.priceTitle')
            ->getText();
        return $percent;
    }

    public static function removeDuplicates($arr1, $arr2)
    {
        $uniqueArray = [];
        $notUnique = false;
        if (!empty($arr2)) {
            foreach ($arr1 as $coin) {
                $notUnique = false;
                foreach ($arr2 as $coin2) {
                    if ($coin == $coin2) {
                        $notUnique = true;
                    }
                }
                if (!$notUnique) {
                    $uniqueArray[] = $coin;
                }
            }
            return $uniqueArray;
        } else {
            return $arr1;
        }
    }

    public function getClient()
    {
        return $this->client;
    }
}