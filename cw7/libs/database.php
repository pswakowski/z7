<?php

$dbhost = "";
$dbuser = "";
$dbpassword = "";
$dbname = "";
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$connection) {
    echo "Błąd: " . mysqli_connect_errno() . " " . mysqli_connect_error();
}