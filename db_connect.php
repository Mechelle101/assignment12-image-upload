<?php


// Keep database credentials in a separate file
// 1. Easy to exclude this file from source code managers
// 2. Unique credentials on development and production servers
// 3. Unique credentials if working with multiple developers

// define("DB_SERVER", "localhost");//connecting remotely would be the site ip
// define("DB_USER", "MechellePresnell");
// define("DB_PASS", "Bri96And98Tyl01");
// define("DB_NAME", "birdQueries");

$server_name = "localhost";
$user_name = "MechellePresnell";
$password = "Bri96And98Tyl01";
$db_name = "birdQueries";

$conn = mysqli_connect($server_name, $user_name, $password, $db_name);
// var_dump($conn);exit();
if(!$conn) {
  echo "Connection failed!";
  exit();
}

?>