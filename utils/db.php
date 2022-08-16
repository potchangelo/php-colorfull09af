<?php
// Load config
require("utils/db-config.php");

// Start connection
$connection = mysqli_connect($host, $username, $password, $dbname, $port);
if (!$connection) {
    die("DB connection error : " . mysqli_connect_error());
}
