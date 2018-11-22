<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Musisz się najpierw zalogowac!";
    header('location: /cw7/libs/login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: /cw7/libs/login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Swakowski</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- <meta http-equiv="refresh" content="20" /> -->
    <style>
        body {background-color: #f5f5f5;}
    </style>
</head>
<body>
<div class="container">
    <h1 style="padding: 50px 0 25px 0 ;" class="text-center">Twoja Chumra Plików</h1>
    <div class="content">

        <hr>


        <?php if (isset($_SESSION['username'])) : ?>
            <ul class="nav justify-content-center">
                <li class="nav-item" style="margin-right: 10rem;">
                    <p>Witaj, <strong><?php echo $_SESSION['username']; ?></strong>.</p>
                </li>
                <?php if (isset($_SESSION['success'])) {
                    echo '<li class="nav-item" style="margin-right: 10rem;"><h6>';
                    echo $_SESSION['success'];
                    echo '</h6></li>';
                    unset($_SESSION['success']);
                }
                ?>
                <li class="nav-item">
                    <a href="libs/login.php?logout='1'" style="color: red;">Wyloguj</a>
                </li>
            </ul>
        <?php endif ?>
        <hr>
    </div>


