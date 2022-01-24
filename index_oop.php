<?php

class Bank
{
    const POLICY = 'Всі права користувачів захищені ';
    protected $uah;
    protected  $usd;
    protected  $eur;
    protected  $exchangeUsd;
    protected  $exchangeEur;

    public function __construct($uah, $usd, $eur, $exchangeUsd, $exchangeEur)
    {
        $this->uah = $uah;
        $this->usd = $usd;
        $this->eur = $eur;
        $this->exchangeUsd = $exchangeUsd;
        $this->exchangeEur = $exchangeEur;

    }
    public function ChangeUsd($cameUsd)
    {
        $issuedUah = $this->exchangeUsd * $cameUsd;
        if ($issuedUah <= $this->uah) {
            $this->uah = $this->uah - $issuedUah;
            $this->usd = $this->usd + $cameUsd;
            return $issuedUah;
        } else {
            return -1;
        }
    }
    public function ChangeEur($cameEur){
        $issuedUah = $this->exchangeEur * $cameEur;
        if ($issuedUah <= $this->uah) {
            $this->uah = $this->uah - $issuedUah;
            $this->eur = $this->eur + $cameEur;
            return $issuedUah;
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


    public function __construct($uah, $usd, $eur, $exchangeUsd, $exchangeEur)
    {
        $exchangeUsd = $exchangeUsd + 0.02;
        $exchangeEur = $exchangeEur + 0.02;

        parent::__construct($uah, $usd, $eur, $exchangeUsd, $exchangeEur);
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





