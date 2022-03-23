<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sehs4517";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  echo  "Error in connection.<br>" . $e->getMessage();
}

?>