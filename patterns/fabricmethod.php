<?php

/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 12.04.17
 * Time: 23:26
 */
interface Interviewer
{
    public function saySomething() : string;
}

class Man implements Interviewer
{
    public function saySomething() : string
    {
        return "I am the Man";
    }
}

class Woman implements Interviewer
{
    public function saySomething() : string
    {
        return "I don't really want to say anything";
    }
}

abstract class God
{
    abstract function createPerson() : Interviewer;

    public function usePerson() : string
    {
        $person = $this->createPerson();
        return $person->saySomething();
    }
}

class ManGod extends God
{
    public function createPerson() : Interviewer
    {
        return new Man();
    }
}

class WomanGod extends God
{
    public function createPerson() : Interviewer
    {
        return new Woman();
    }
}

$manGod = new ManGod();
var_dump($manGod->usePerson());
$womanGod = new WomanGod();
echo $womanGod->usePerson();