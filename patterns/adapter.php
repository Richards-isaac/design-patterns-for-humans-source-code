<?php

/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 23.04.17
 * Time: 21:05
 */
interface Lion
{
    public function roar();
}

class AfricanLion implements Lion
{
    public function roar()
    {
    }
}

class AsianLion implements Lion
{
    public function roar()
    {
    }
}

class Hunter
{
    public function hunt(Lion $lion)
    {
    }
}

class WildDog
{
    public function bark()
    {
    }
}

// Адаптер вокруг собаки сделает её совместимой с охотником
class WildDogAdapter implements Lion
{
    protected $dog;

    public function __construct(WildDog $dog)
    {
        $this->dog = $dog;
    }

    public function roar()
    {
        $this->dog->bark();
    }
}

$wildDog = new WildDog();
$wildDogAdapter = new WildDogAdapter($wildDog);

$hunter = new Hunter();
$hunter->hunt($wildDogAdapter);