<?php
require_once('../routes.php');

// Autoload helper file
spl_autoload_register(function(){
  require_once('../Controllers/Helpers.php');
});


spl_autoload_register(function($class_name){
  $path = explode("\\", $class_name); // ['Controllers', 'HomeController']
  $path = "../".implode("/", $path).".php"; // ../Controllers/HomeController.php
  require_once($path);
});

$current_path = $_SERVER['REQUEST_URI'];
$filtered_routes = array_filter($routes, function($route) use ($current_path) {
  return $route['path'] === $current_path;
});

if(count($filtered_routes) === 0) {
  echo "Page Not Found";
  die;
}


$filtered_routes = array_values($filtered_routes);
$route = $filtered_routes[0];
$class = "Controllers\\".$route['controller']; // Controllers\HomeController

//$class="Controllers\HomeController"
$obj = new $class; // $obj = new Controllers\HomeController;
$action = $route['action'];
//$action = "index"
try {

  $obj->$action(); //$obj->index();
}
catch(Throwable $e) {
  var_export($e ->getMessage());
  die();
}