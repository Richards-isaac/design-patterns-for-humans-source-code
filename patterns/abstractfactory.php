<?php

/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 13.04.17
 * Time: 22:07
 */
interface Doorn
{
    public function getDescription();
}

class WoodenDoor implements Doorn
{
    public function getDescription()
    {
        echo 'I am a wooden door';
    }
}

class IronDoor implements Doorn
{
    public function getDescription()
    {
        echo 'I am an iron door';
    }
}
interface DoorFittingExpert
{
    public function getDescription();
}

class Welder implements DoorFittingExpert
{
    public function getDescription()
    {
        echo 'I can only fit iron doors';
    }
}

class Carpenter implements DoorFittingExpert
{
    public function getDescription()
    {
        echo 'I can only fit wooden doors';
    }
}
interface DoorFactory
{
    public function makeDoor(): Doorn;
    public function makeFittingExpert(): DoorFittingExpert;
}

class WoodenDoorFactory implements DoorFactory
{
    public function makeDoor(): Doorn
    {
        return new WoodenDoor();
    }

    public function makeFittingExpert(): DoorFittingExpert
    {
        return new Carpenter();
    }
}

class IronDoorFactory implements DoorFactory
{
    public function makeDoor(): Doorn
    {
        return new IronDoor();
    }

    public function makeFittingExpert(): DoorFittingExpert
    {
        return new Welder();
    }
}

$woodenFactory = new WoodenDoorFactory();

$door = $woodenFactory->makeDoor();
$expert = $woodenFactory->makeFittingExpert();

$door->getDescription();  // Output: Я деревянная дверь
$expert->getDescription(); // Output: Я могу устанавливать только деревянные двери

// Same for Iron Factory
$ironFactory = new IronDoorFactory();

$door = $ironFactory->makeDoor();
$expert = $ironFactory->makeFittingExpert();

$door->getDescription();  // Output: Я стальная дверь
$expert->getDescription(); // Output: Я могу устанавливать только стальные двери