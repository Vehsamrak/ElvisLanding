<?php

namespace Siemens\Elvisland\Entity;

/**
 * News author
 * @author Vehsamrak
 */
class Author
{

    /** @var string */
    private $login;

    /** @var string */
    private $name;

    /** @var string */
    private $password;

    /**
     * @param string $login
     * @param string $name
     * @param string $password
     */
    public function __construct($login, $name, $password)
    {
        $this->login = $login;
        $this->name = $name;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}
