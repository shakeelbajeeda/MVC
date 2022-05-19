<?php

namespace Lib\Database;

interface DatabaseContract
{
  public function insert($table, $data);
  public function all($table);
  public function find($id, $table, $key);
  public function delete($id, $table, $key);
}
