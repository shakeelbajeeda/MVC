<?php

namespace Lib\Database;

class DB {
  static $instance;
  static function __callStatic($name, $arguments) {
    if(!self::$instance) {
      self::$instance = Mysql::getInstance();
    }

    //die(var_dump(self::$instance->$name(...$arguments)));
    return self::$instance->$name(...$arguments);
  }
}
