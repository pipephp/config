<?php

namespace Pipe;

function config(string $key, mixed $val = null):mixed
{
    if (isset($val)) {
        return Config::set($key, $val);
    }
    return Config::get($key);
}
