<?php

namespace JefersonC\Enum;

abstract class PrettyEnum
{
    protected static $instances = [];

    private static function childInstance() {
        $class = get_called_class();

        if(!isset(static::$instances[$class])) {
            static::$instances[$class] = new $class();
        }

        return static::$instances[$class];
    }

    private static function constants() {
        $class = static::childInstance();
        return $class->register();
    }

    public static function get($index) {
      $item = static::getItem($index);

      return $item['value'];
    }

    public static function pretty($index) {
        $item = static::getItem($index);

        return $item['name'];
    }

    public static function all() {
        $constants = static::constants();

        $out = [];

        foreach($constants as $index => $const) {
            $out[] = static::mountItem($const);
        }

        return $out;
    }

    private static function getItem($key) {
        $constants = static::constants();

        if (!isset($constants[$key])) {
            throw new InvalidEnumKeyException(sprintf('Key %s does not exists on %s', $key, get_class(static::childInstance())));
        }

        return $constants[$key];
    }

    public static function item($key) {
        return static::mountItem(static::getItem($key));
    }

    private static function mountItem($item) {
        $obj = new \stdClass();

        foreach($item as $key => $value) {
            $obj->{$key} = $value;
        }

        return $obj;
    }

    public static function __callStatic($name, $arguments)
    {
        if(!method_exists(__CLASS__, $name)) {
            throw new InvalidEnumMethodException(sprintf('Method %s does not exists', $name));
        }

        return static::{$name}($arguments);
    }
}
