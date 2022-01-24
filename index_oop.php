<?php

class Bank
{
    const POLICY = 'Всі права користувачів захищені ';
    protected $uah;
    protected  $usd;
    protected  $eur;
    protected  $exchangeusd;
    protected  $exchangeeur;

    public function __construct($uah, $usd, $eur, $exchangeusd, $exchangeeur)
    {
        $this->uah = $uah;
        $this->usd = $usd;
        $this->eur = $eur;
        $this->exchangeusd = $exchangeusd;
        $this->exchangeeur = $exchangeeur;

    }
    public function ChangeUsd($newusd)
    {
        $x_uah = $this->exchangeusd * $newusd;
        if ($x_uah <= $this->uah) {
            $this->uah = $this->uah - $x_uah;
            $this->usd = $this->usd + $newusd;
            return $x_uah;
        } else {
            return -1;
        }
    }
    public function ChangeEur($newueur){
        $x_uah = $this->exchangeeur * $newueur;
        if ($x_uah <= $this->uah) {
            $this->uah = $this->uah - $x_uah;
            $this->eur = $this->eur + $newueur;
            return $x_uah;
        } else {
            return -1;
        }
    }

    public function __get($name)
    {
        echo "У вас недостатньо прав для даної операції";
    }
}


class Monobank extends Bank{



    public function __construct($uah, $usd, $eur, $exchangeusd, $exchangeeur)
    {
        $exchangeusd = $exchangeusd + 0.02;
        $exchangeeur = $exchangeeur + 0.02;

        parent::__construct($uah, $usd, $eur, $exchangeusd, $exchangeeur);
    }
}



$kasa = new Bank(3000, 150, 100, 28.5, 32);
$kasa->ChangeUsd(100);
$kasa->ChangeEur(200);
$kasa->usd;
echo Bank::POLICY;
print_r($kasa);

$mono = new Monobank(4000, 150, 100, 28.5, 32);
$mono->ChangeUsd(100);
$mono->ChangeEur(200);
$mono->uskiod;
echo Bank::POLICY;

print_r($mono);





