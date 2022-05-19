<?php

namespace Lib\Database;

class Mysql implements DatabaseContract
{
  protected $db;
  protected static $instance;
  protected function __construct()
  {
    $this->db = mysqli_connect("172.17.0.1", "root", "NodeSol786", "mvc");
  }

  protected function __destruct()
  {
    $this->db->close();
  }

  static function getInstance()
  {
    if (!self::$instance) {
      self::$instance = new static;
    }

    return self::$instance;
  }

  function find($id, $table, $key)
  {
    $query = "SELECT * FROM {$table} WHERE {$key}='{$id}'";
    $result = $this->db->query($query);
    if ($result->num_rows > 0) {
      return $result->fetch_row();
    }
  }
  function delete($id, $table, $key = 'id')
  {
    $id = (int) $id;
    $query = "DELETE FROM {$table} WHERE {$key}={$id};";
    // die(var_export($query));

    $result = $this->db->query($query);
    if ($result) {
      return $result;
    } else {
      die("invalid id");
    }
  }

  function all($table)
  {
    $query = "SELECT * FROM {$table}";
    $result = $this->db->query($query);
    if ($result->num_rows > 0) {
      $output = [];
      return $result->fetch_all(MYSQLI_ASSOC);
      /*while($row = $result->fetch_assoc()) {
        $output[] = $row;
      }*/
    }

    return $output;
  }

  function get_all_employees($table)
  {
    $query = "SELECT e.id,  e.name, e.email, c.name as company FROM {$table} as e INNER JOIN companies c on c.id = e.company";
    $result = $this->db->query($query);
    $output = [];
    if ($result->num_rows > 0) {
      return $result->fetch_all(MYSQLI_ASSOC);
      /*while($row = $result->fetch_assoc()) {
        $output[] = $row;
      }*/
    }

    return $output;
  }

  function insert($table, $data)
  {
    $query = "INSERT INTO {$table} ";
    $data = $this->computeFieldsValues($data);
    $fields = implode(",", $data['fields']);
    $values = implode(",", $data['values']);
    $query .= " ({$fields}) VALUES {$values}";
    $this->db->query($query);
    return $this->db->insert_id;
  }
  function update($table, $data)
  {
    $query = "UPDATE {$table} set ";
    $update_query = $this->getUpdateQuery($data);
    $query .= " {$update_query}";
    $query .= " where id = " . $data['id'];
    // die(var_ export($query));
    $this->db->query($query);
    return true;
  }

  function getUpdateQuery($data)
  {
    $update = '';
    $size = count($data);
    $counter = 0;
    foreach ($data as  $key => $v) {
      if ($key != 'id') {
        if ($counter < $size - 1) {
          $update .= $key . ' = "' . $v . '", ';
        } else {
          $update .= $key . ' = "' . $v . '" ';
        }
      }

      // var_export($key);
      $counter++;
    }
    return $update;
  }

  function computeFieldsValues($data)
  {
    $fields = [];
    $values = [];
    if (isset($data[0]) && is_array($data[0])) {
      $fields = array_keys($data[0]);
      foreach ($data as $row) {
        $values[] = "('" . implode("', '", array_values($data)) . "')";
      }
    } else {
      $fields = array_keys($data);
      $values[] = "('" . implode("', '", array_values($data)) . "')";
    }
    return ["fields" => $fields, "values" => $values];
  }
}
