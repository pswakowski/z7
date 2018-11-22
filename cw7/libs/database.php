<?php

$dbhost = "az-serwer1899722.online.pro";
$dbuser = "00167332_geo";
$dbpassword = "Memek123$";
$dbname = "00167332_geo";
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$connection) {
    echo "Błąd: " . mysqli_connect_errno() . " " . mysqli_connect_error();
}