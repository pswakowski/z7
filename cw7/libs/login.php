<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Swakowski</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/cw7/css/style.css">
</head>
<body class="text-center">


<form method="post" action="login.php" class="form-signin">
        <h1 class="h3 mb-3 font-weight-normal">Zaloguj się</h1>
    <div class="input-group">
        <label class="sr-only">Username</label>
        <input class="form-control" type="text" name="username" placeholder="Nazwa użytkownika">
    </div>
    <div class="input-group">
        <label class="sr-only">Password</label>
        <input class="form-control" type="password" name="password" placeholder="Hasło">
    </div>
    <div class="input-group">
        <button type="submit" class="btn btn-lg btn-primary btn-block" name="login_user">Zaloguj</button>
    </div>
    <?php include('errors.php'); ?>
    <br>
    <p>
        Nie masz konta? <a href="register.php">Zarejestruj się!</a>
    </p>
    <a href="https://i.imgur.com/umpXRU9.png" target="_blank">Model bazy danych</a><br>
    <a href="https://github.com/pswakowski/z7" target="_blank">Repozytorium na GitHubie</a><br>
    <a href="https://webspeed.intensys.pl/wyniki/135322/" target="_blank">Wynik analizy serwisu</a>
</form>

</body>
</html>