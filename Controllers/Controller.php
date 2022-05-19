<?php

namespace Controllers;

class Controller
{
  protected function view($file, $data = [])
  {
    ob_start();
    $filename = "../views/" . $file . ".php";
    require_once($filename);
    $var = ob_get_contents();
    ob_end_clean();
    echo $var;
  }

  protected function upload_img($folder, $name = 'image')
  {
    $target_dir = "../public/uploads/" . $folder . '/';
    $file_name =  explode('.', $_FILES[$name]["name"]);
    $file_name = $file_name[0] . '_' . time() . '_' . mt_rand(1111, 9999) . '.' . $file_name[1];
    $target_file = $target_dir . basename($file_name);
    if (!move_uploaded_file($_FILES[$name]['tmp_name'], $target_file)) {
      die("Image not uploaded in the folder " . $folder);
    }
    return $file_name;
  }

  protected function delete_image($folder, $image_name)
  {

    $target_dir = "../public/uploads/" . $folder . '/' . $image_name;
    if (file_exists($target_dir)) {
      unlink($target_dir);
      return true;
    } else {
      die("Old image not delete from this path  " . $target_dir);
    }
  }

  protected function redirect($path)
  {
    header("Location: " . $path);
  }
}
