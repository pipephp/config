<?php

namespace Pipe;

class Config
{
    public static $db = [];

    public static function set(string $path, $value):void
    {
        $nodes = explode(".", $path);

        if (count($nodes) == 1) {
            self::$db[$path] = $value;
        } else {
            self::$db[array_shift($nodes)]
            [implode(".", $nodes)]
            = $value;
        }
    }

    public static function get(string $path):mixed
    {
        $nodes = explode(".", $path);
        return count($nodes) == 1
            ? self::$db[$path] ?? null
            : self::$db[array_shift($nodes)][implode(".", $nodes)] ?? null;
    }
}
