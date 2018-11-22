<?php
session_start();
include_once 'database.php';

$username = "";
$errors = array();
$success = array();

// REJESTRACJA
if (isset($_POST['reg_user'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password_1 = mysqli_real_escape_string($connection, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($connection, $_POST['password_2']);


    if (empty($username)) {
        array_push($errors, "Nazwa użytkownika jest wymagana");
    }
    if (empty($password_1)) {
        array_push($errors, "Hasło jest wymagane");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "Hasła nie są identyczne");
    }

    $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($connection, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['username'] === $username) {
            array_push($errors, "Użytkownik aktualnie istnieje");
        }
    }

    if (count($errors) == 0) {
        $password = $password_1;

        $query = "INSERT INTO users (username, passcode) VALUES('$username', '$password')";
        mysqli_query($connection, $query);
        $_SESSION['username'] = $username;

        $query = "SELECT * FROM users WHERE username='$username'";
        $result = $connection->query($query);
        $rekord = mysqli_fetch_array($result);
        $id = $rekord['id'];
        $query = "INSERT INTO logi(idu, success, failure) VALUES ('$id', CURRENT_TIMESTAMP(), '')";
        $connection->query($query);
        mkdir("../users_files/$username", 0777);
        array_push($success, 'Możesz sie teraz <a href="login.php">zalogować</a>.');
    }
}

// LOGIN
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Pole nazwy użytkownika jest wymagane!");
    }
    if (empty($password)) {
        array_push($errors, "Pole hasła jest wymagane!");
    }

    if (count($errors) == 0)
    {
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = $connection->query($query);

        $rekord = mysqli_fetch_array($result);
        $status = $rekord['attempt'];

        if (!$rekord)
        {
            mysqli_close($connection);
            array_push($errors, "Brak użytkownika o takich danych!");
        } else
            {
            if (substr($status, 0, 2) == "b-")
            {
                $blockedTime = substr($status, 2);
                if (time() < $blockedTime)
                {
                    $block = true;
                } else
                    {
                    $query = "UPDATE users SET attempt='' WHERE username='$username'";
                    $connection->query($query);
                }
            }

            if ($block == true)
            {

                array_push($errors, "Zostaniesz odblokowany o: ".date("Y-m-d H:i:s", $blockedTime));
            }

            if (!isset($block))
            {
                if ($rekord['passcode'] == $password)
                {
                    $query = "UPDATE users SET attempt='' WHERE username='$usename'";
                    $connection->query($query);
                    $_SESSION['username'] = $username;
                    setcookie('username', $username, time()+3600);

                    $query = "SELECT failure FROM logi WHERE idu='{$rekord['id']}'";
                    $result = $connection->query($query);
                    $rekord = mysqli_fetch_array($result);

                    $_SESSION['success'] = "Zostałeś zalogowany pomyślnie. <span style='color: red;'> Ostatnie niepoprawne logowanie {$rekord['failure']} </span>";
                    $query = "UPDATE logi SET success = CURRENT_TIMESTAMP WHERE idu = '{$rekord['id']}'";
                    $connection->query($query);
                    header('location: ../index.php');
                } else
                    {
                        $query = "UPDATE logi SET failure = CURRENT_TIMESTAMP WHERE idu = '{$rekord['id']}'";
                        $connection->query($query);
                    if ($status == "")
                    {
                        $query = "UPDATE users SET attempt='1' WHERE username='$username'";
                        $connection->query($query);
                        array_push($errors, "To Twoja 1 zła próba logowania. Po 3 złej zostaniesz zablokowany!");
                    } else if ($status == 3)
                    {
                        $query = "UPDATE users SET attempt='b-" . strtotime("+2 minutes", time()) . "' WHERE username='$username'";
                        $connection->query($query);
                        array_push($errors, "Zostałes zablokowany na 2 minuty.");
                    } else if (substr($status, 0, 2) == "b-")
                    {

                    } else if ($status <= 3)
                    {
                        $status++;
                        $query = "UPDATE users SET attempt='$status' WHERE username='$username'";
                        $connection->query($query);
                        array_push($errors, "To Twoja $status zła próba logowania. Po 3 złej zostaniesz zablokowany");
                    }
                }
            }
        }








//        if (mysqli_num_rows($results) == 1) {
//
//
//
//            $_SESSION['username'] = $username;
//            $_SESSION['success'] = "Zostałeś zalogowany pomyślnie";
//            header('location: ../index.php');
//        } else {
//
//
//            array_push($errors, "Podałeś złą nazwę użytkownika/ hasło!");
//        }
    }
}
