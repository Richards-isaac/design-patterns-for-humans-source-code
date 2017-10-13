<?php
/**
 * Created by PhpStorm.
 * User: sydorenkovd
 * Date: 13.10.17
 * Time: 17:21
 * Single Responsibility principle
 */
class User {
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
class UserAuth
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function verifyCredentials(): bool
    {
       if($this->user->getName() == 'Petya') {
           return true;
       }
        return false;
    }
}

class UserSettings
{
    private $user;
    private $auth;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->auth = new UserAuth($user);
    }

    public function changeSettings(array $settings): void
    {
        if ($this->auth->verifyCredentials()) {
            echo 'Petya is here';
        }
    }
}

$settings = new UserSettings(new User((string)'Petya'));
$settings->changeSettings([]);