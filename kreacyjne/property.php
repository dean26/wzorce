<?php

/**
 * Prosty wzorzecz, który może przechowywać konfiguracje systemu
 */

/**
 * Config
 */
class Config
{
    private static array $options = [];
    
    /**
     * set
     *
     * @param  string $name
     * @param  ?string $value
     * @return void
     */    
    public static function set(string $name, ?string $value)
    {
        self::$options[$name] = $value;
    }  

    /**
     * get
     *
     * @param  string $name
     * @param  string $default
     * @return ?string
     */
    public static function get(string $name, string $default = null): ?string
    {
        return isset(self::$options[$name]) ? self::$options[$name] : $default;
    }
}

Config::set('lang', 'pl');
Config::set('avg', 20.50);

echo Config::get('lang');
echo Config::get('avg');
echo Config::get('path', '/uploads');
