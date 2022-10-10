<?php
// Load config
require("utils/db-config.php");

// Start connection
mysqli_report(MYSQLI_REPORT_OFF);
$connection = mysqli_connect($host, $username, $password, $dbname, $port);
if (!$connection) {
  die("DB connection error : " . mysqli_connect_error());
}
mysqli_set_charset($connection, 'utf8mb4');
