<?php

namespace Backend\Db;
use Backend\Config\Config;

/**
 * Class Connect
 * @package Backend\Db
 */
class Connect
{

    /**
     * @var Connect|null
     */
    private static $instance;

    /**
     * @return Connect|null
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * @var \PDO|null
     */
    private $resource;

    /**
     * Connect constructor.
     */
    public function __construct()
    {
        $dsn = vsprintf(
            'mysql:host=%s;dbname=%s;',
            [
                Config::get('db', 'host'),
                Config::get('db', 'database'),
            ]
        );

        $this->resource = new \PDO($dsn, Config::get('db', 'user'), Config::get('db', 'password'));
    }

    /**
     * @return null|\PDO
     */
    public function getResource()
    {
        return $this->resource;
    }

}