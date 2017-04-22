<?php
interface Door
{
    public function getWidth(): float ;
    public function getHeight(): float;
}

class WoodenDoor implements Door
{
    protected $width;
    protected $height;
    protected $material;

    public function __construct(float $width, float $height, int $material)
    {
        $this->width = $width;
        $this->height = $height;
        $this->material = $material;

    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }
    public function getMaterial() : int {
        return $this->material;
    }
}
class DoorFactory
{
    public static function makeDoor($width, $height, $material): WoodenDoor
    {
        return new WoodenDoor($width, $height, $material);
    }
}
$door = DoorFactory::makeDoor(100, 200, 3);
echo 'Width: ' . $door->getWidth();
echo 'Height: ' . $door->getHeight();
echo 'Material: ' . $door->getMaterial();