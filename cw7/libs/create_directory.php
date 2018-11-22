<?php

$errors = array();
$success = array();
$username = $_SESSION['username'];
$create_dir = $_POST['nazwa_podkatalogu'];

$dir = $_SERVER['DOCUMENT_ROOT'] . "cw7/users_files/" . $username . "/" . $create_dir;

if (isset($_POST['stworz_podkatalog'])) {
    mkdir($dir);
    array_push($success, "Stworzyłes podkatalog $create_dir.");
}

