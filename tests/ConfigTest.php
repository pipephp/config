<?php

use Pipe\Config;

use function Pipe\config;

beforeEach(function () {
    Config::$db = [];
});

it("can set config value with function", function () {
    config('key', 'val');
    expect(Config::$db['key'])->toEqual('val');
});

it("can set flat-nested config", function () {
    config('key.subkey', 'val');
    expect(Config::$db['key'])->toBeArray();
    expect(Config::$db['key']['subkey'])->toEqual('val');
});

it("can set multi-flat-nested config", function () {
    config('key.subkey.one.two.three.four', 'val');
    expect(Config::$db['key'])->toBeArray();
    expect(Config::$db['key']['subkey.one.two.three.four'])->toEqual('val');
});

it("can set array as values", function () {
    config('key.subkey.one.two.three.four', ['val']);
    expect(Config::$db['key']['subkey.one.two.three.four'][0])->toEqual('val');
    expect(config('key.subkey.one.two.three.four')[0])->toEqual('val');
});
