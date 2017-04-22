<?php

/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 22.04.17
 * Time: 23:20
 */
class Sheep
{
    protected $name;
    protected $category;

    public function __construct(string $name, string $category = 'Mountain Sheep')
    {
        $this->name = $name;
        $this->category = $category;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setCategory(string $category)
    {
        $this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
    }
}

$original = new Sheep('Jolly');
echo $original->getName(); // Джолли
echo $original->getCategory(); // Горная овечка

// Клонируйте и модифицируйте, что нужно
$cloned = clone $original;
$cloned->setName('Dolly');
echo $cloned->getName(); // Долли
echo $cloned->getCategory(); // Горная овечка