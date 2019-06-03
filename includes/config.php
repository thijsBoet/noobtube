<?php
ob_start();

date_default_timezone_set("Europe/Amsterdam");

try {
  $con = new PDO("mysql:dbname=videotube;host=localhost", "root", "");
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>