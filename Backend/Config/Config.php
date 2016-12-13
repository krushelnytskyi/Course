<?php

namespace Backend\Config;

/**
 * Class Config
 * @package Backend\Config
 */
class Config
{

    /**
     * @var array
     */
    private static $cache = [];

    /**
     * @param string $config
     * @param string $key
     * @param null $default
     * @return mixed|null
     */
    public static function get(string $config, string $key, $default = null)
    {
        if (false === isset(static::$cache[$config])) {
            static::$cache[$config] = parse_ini_file(APP_PATH . 'config/' . $config . '.ini');
        }

        if (true === isset(static::$cache[$config][$key])) {
            return static::$cache[$config][$key];
        }

        return $default;
    }

}