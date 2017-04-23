<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 23.04.17
 * Time: 22:31
 */
interface Doorm
{
    public function open();
    public function close();
}

class LabDoor implements Doorm
{
    public function open()
    {
        echo "Opening lab door";
    }

    public function close()
    {
        echo "Closing the lab door";
    }
}
class Security
{
    protected $door;

    public function __construct(Doorm $door)
    {
        $this->door = $door;
    }

    public function open($password)
    {
        if ($this->authenticate($password)) {
            $this->door->open();
        } else {
            echo "Big no! It ain't possible.";
        }
    }

    public function authenticate($password)
    {
        return $password === '$ecr@t';
    }

    public function close()
    {
        $this->door->close();
    }
}
$door = new Security(new LabDoor());
$door->open('invalid'); // Big no! It ain't possible.

$door->open('$ecr@t'); // Opening lab door
$door->close(); // Closing lab door