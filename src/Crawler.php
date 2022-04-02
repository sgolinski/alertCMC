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

    public function assignElementsFromContent(ArrayIterator $content)
    {
        foreach ($content as $webElement) {
            assert($webElement instanceof RemoteWebElement);
            try {
                $name = $webElement->findElement(WebDriverBy::tagName('a'))
                    ->findElement(WebDriverBy::tagName('p'))->getText();
                $link = $webElement->findElement(WebDriverBy::tagName('a'))
                    ->getAttribute('href');
                $price = $webElement->findElement(WebDriverBy::cssSelector('td:nth-child(3)'))
                    ->getText();
                $percent = (float)$webElement->findElement(WebDriverBy::cssSelector('td:nth-child(4)'))
                    ->getText();
            } catch (Exception $e) {
                echo 'Error when crawl information ' . $e->getMessage() . PHP_EOL;
                continue;
            }
            if ($percent > 30.00) {
                $this->returnArray[] = new Coin($name, $price, $percent, $link);
            }
        }
    }

    public function assignDetailInformationToCoin($link)
    {
        if ($this->client == null) {
            $this->client = PantherClient::createChromeClient();
        }
        $this->client->refreshCrawler();
        $this->client->get($link);
        $isDown = false;
        $icon = $this->client->getCrawler()
            // ->filter('div.sc-16r8icm-0.kjciSH.priceTitle')
            ->filter('span.sc-15yy2pl-0.feeyND > span')
            ->getAttribute('class');

        if ($icon == 'icon-Caret-down') {
            $percent = $this->client->getCrawler()
                ->filter('div.sc-16r8icm-0.kjciSH.priceTitle')
                //->filter('span.sc-15yy2pl-0.feeyND')
                ->getText();
            $isDown = true;
        } else {

            $percent = $this->client->getCrawler()
                ->filter('div.sc-16r8icm-0.kjciSH.priceTitle')
                //->filter('span.sc-15yy2pl-0.feeyND')
                ->getText();
        }
        return [$isDown, $percent];
    }

    public static function removeDuplicates($arr1, $arr2)
    {
        $uniqueArray = [];
        $notUnique = false;
        if (!empty($arr2)) {
            foreach ($arr1 as $coin) {
                $notUnique = false;
                assert($coin instanceof Coin);
                foreach ($arr2 as $coin2) {
                    assert($coin2 instanceof Coin);
                    if (trim($coin->getName()) == trim($coin2->getName())) {
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


    public function assignAddressAndNameToCoin($link)
    {

        try {
            $this->client->refreshCrawler();
            $this->client->get($link);
            $address = $this->client->getCrawler()
                ->filter('div.content')
                ->filter('a.cmc-link')
                ->getAttribute('href');

            $name = $this->client->getCrawler()
                ->filter('h2.sc-1q9q90x-0.jCInrl.h1')
                ->getText();

            $percent = $this->client->getCrawler()
                ->filter('div.sc-16r8icm-0.kjciSH.priceTitle')
                //->filter('span.sc-15yy2pl-0.feeyND')
                ->getText();

        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {


            return [$name, $address, $percent];
        }

    }

    public
    function getClient()
    {
        return $this->client;
    }
}