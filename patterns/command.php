<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 14.08.17
 * Time: 16:38
 */
// Receiver
class Bulb
{
    public function turnOn()
    {
        echo "Bulb has been lit";
    }

    public function turnOff()
    {
        echo "Darkness!";
    }
    public function breakLamp() {
        echo  'The lamp is braken';
    }
    public function restoreLamp() {
        echo  'The lamp is restored';
    }
}
interface Command
{
    public function execute();
    public function undo();
    public function redo();
}

// Command
class TurnOn implements Command
{
    protected $bulb;

    public function __construct(Bulb $bulb)
    {
        $this->bulb = $bulb;
    }

    public function execute()
    {
        $this->bulb->turnOn();
    }

    public function undo()
    {
        $this->bulb->turnOff();
    }

    public function redo()
    {
        $this->execute();
    }
}
class BreakLamp implements Command  {

    protected $bulb;

    public function __construct(Bulb $bulb)
    {
        $this->bulb = $bulb;
    }
    public function execute()
    {
        $this->bulb->breakLamp();
    }

    public function undo()
    {
        $this->bulb->restoreLamp();
    }

    public function redo()
    {
        $this->execute();
    }
}
class RestoreLamp implements Command  {

    protected $bulb;

    public function __construct(Bulb $bulb)
    {
        $this->bulb = $bulb;
    }
    public function execute()
    {
        $this->bulb->restoreLamp();
    }

    public function undo()
    {
        $this->bulb->breakLamp();
    }

    public function redo()
    {
        $this->execute();
    }
}
class TurnOff implements Command
{
    protected $bulb;

    public function __construct(Bulb $bulb)
    {
        $this->bulb = $bulb;
    }

    public function execute()
    {
        $this->bulb->turnOff();
    }

    public function undo()
    {
        $this->bulb->turnOn();
    }

    public function redo()
    {
        $this->execute();
    }
}
// Invoker
class RemoteControl
{
    public function submit(Command $command)
    {
        $command->execute();
    }
}
$bulb = new Bulb();

$turnOn = new TurnOn($bulb);
$turnOff = new TurnOff($bulb);
$break = new BreakLamp($bulb);
$restore = new RestoreLamp($bulb);

$remote = new RemoteControl();
$remote->submit($turnOn); // Лампочка зажглась!
$remote->submit($turnOff); // Темнота!
$remote->submit($break);
$remote->submit($restore);