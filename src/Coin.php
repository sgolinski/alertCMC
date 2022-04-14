<?php

namespace alertCMC;

class Coin
{
    public string $name = '';
    public string $price = '';
    public float $percent = 0.0;
    public string $mainet = '';
    public string $address = ' ';
    public string $cmcLink = '';
    private string $bscLink = '';


    public function __construct($name, $percent,$cmcLink, $link)
    {
        $this->name = $name;
        $this->percent = (float)$percent;
        $this->cmcLink = $cmcLink;
        $this->bscLink = $link;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPercent(): float
    {
        return $this->percent;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getCmcLink(): string
    {
        return $this->cmcLink;
    }

    public function getDescription(): ?string
    {

        $poocoin = str_replace("https://bscscan.com/token/", "https://poocoin.app/tokens/", $this->getAddress());
        return "Name: " . $this->getName() . PHP_EOL .
            "Drop percent: " . $this->getPercent() . '%' . PHP_EOL .
            "Cmc: " . $this->getCmcLink() . PHP_EOL .
            "Poocoin:  " . $poocoin . PHP_EOL .
             "Bsdscan: " . $this->bscLink;


    }

    public function setPercent(float $percent)
    {
        $this->percent = $percent;
    }

}