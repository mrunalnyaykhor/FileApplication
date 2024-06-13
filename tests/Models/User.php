<?php
namespace Tests\Models;

class User
{
    private $name;
    private $email;
    private $password;

    public function __construct($name = 'User', $email = 'test@gmail.com', $password = 'password123')
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
