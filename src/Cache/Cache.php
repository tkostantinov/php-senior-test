<?php declare(strict_types = 1);

namespace Searchmetrics\SeniorTest\Cache;

class Cache
{
    private static $instance;

    private function __construct()
    {

    }

    public static function get($key)
    {
        return isset(self::getInstance()->$key) ? self::getInstance()->$key : null;
    }

    public static function set($key, $value)
    {
        return self::getInstance()->$key = $value;
    }

    private function getInstance()
    {
        return self::$instance === null
            ? new Cache()
            : self::$instance;

    }
}
