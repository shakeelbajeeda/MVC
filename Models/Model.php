<?php

namespace Models;

use \Lib\Database\DB;

class Model
{

  public $table;
  public $key = "id";
  function __construct()
  {
    $this->table = $this->table ?? $this->generateTableName();
  }
  protected function generateTableName()
  {
    $name = $this::class;
    $name = strtolower(end(explode("\\", $this::class)));
    return $name;
  }
  public function insert()
  {
    $data = $this->modelToArray();

    $id = DB::insert($this->table, $data);
    $this->id = $id;
  }
  public function update()
  {
    $data = $this->modelToArray();

    $id = DB::update($this->table, $data);
    $this->id = $id;
  }

  public static function all()
  {
    $model = new static;
    $data = DB::all($model->table);
    $output = [];
    foreach ($data as $d) {
      $model = new static;
      $model->fill($d);
      $output[] = $model;
    }

    return $output;
  }

  public static function get_all_employees()
  {
    $model = new static;
    $data = DB::get_all_employees($model->table);
    $output = [];
    foreach ($data as $d) {
      $model = new static;
      $model->fill($d);
      $output[] = $model;
    }

    return $output;
  }

  public static function find($id)
  {
    $model = new static;
    $data = DB::find($id, $model->table, $model->key);
    $model->fill($data);
    return $model;
  }

  public static function findById($id)
  {
    $model = new static;
    return DB::find($id, $model->table, $model->key);
  }
  public static function delete($id)
  {
    $model = new static;
    return DB::delete($id, $model->table);
  }

  public function fill($data = [])
  {
    foreach ($data as $key => $value) {
      $this->$key = $value;
    }
  }

  private function modelToArray()
  {
    $model = json_decode(json_encode($this), 1);
    unset($model['key']);
    unset($model['table']);
    return $model;
  }
}
