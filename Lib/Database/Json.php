<?php
namespace Lib\Database;

class Json implements DatabaseContract {
  protected $filename = "../data.json";
  protected static $instance;
  protected function __construct() {

  }

  static function getInstance() {
    if(!self::$instance) {
      self::$instance = new static;
    }

    return self::$instance;
  }

  function find($id, $table, $key) {
    $data = $this->getFileData();
    $data = array_filter($data[$table], function($item) use($id, $key) {
      return $item[$key] == $id;
    });
    $data = array_values($data);
    return $data[0];
  }

  function all($table) {
    $model = new static;
    $data = $this->getFileData();
    $output = [];
    foreach($data[$table] as $item) {
      $output[] = $item;
    }
    return $output;
  }

  function insert($table, $data) {
    $current = $this->getFileData();
    if(!isset($current[$table])) {
      $current[$table] = [];
    }
    $current[$table][] = $data;
    $this->saveFileData($current);
  }

  private function getFileData() {
    return json_decode(file_get_contents($this->filename), 1);
  }

  private function saveFileData($data) {
    file_put_contents($this->filename, json_encode($data));
  }
}
