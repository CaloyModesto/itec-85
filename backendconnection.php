<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "backend_admin";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    die("connection failed!");
}
?>