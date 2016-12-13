<?php

namespace Backend\Auth;

use Backend\Blog\User;

/**
 * Class Storage
 * @package Backend\Auth
 */
class Storage
{

    /**
     * @var Storage
     */
    private static $instance;

    /**
     * @return Storage
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * @var int
     */
    private $identity;

    public function __construct()
    {
        $this->identity = $_SESSION['IDENTITY'];
    }

    /**
     * @return User|null
     */
    public function getIdentity()
    {
        if (null !== $this->identity) {
            return User::find($this->identity);
        }
    }

    /**
     * @param int $identity
     */
    public function setIdentity(int $identity)
    {
        $this->identity = null;
        $_SESSION['IDENTITY'] = $identity;
    }

    /**
     *
     */
    public function clearIdentity()
    {
        $this->identity = null;
        $_SESSION['IDENTITY'] = null;
    }

}